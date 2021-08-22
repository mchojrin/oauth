<?php

use League\OAuth2\Server\Exception\OAuthServerException;

require_once 'bootstrap.php';

try {

    if (!array_key_exists('authRequest', $_SESSION)) {
        $authRequest = $server->validateAuthorizationRequest($request);
        $client = $clientRepository->getClientEntity($request->getQueryParams()['client_id']);
        $authRequest->setClient($client);
        $authRequest->setRedirectUri($client->getRedirectUri());
        $authRequest->setScopes([$scopeRepository->getScopeEntityByIdentifier(1)]);
        $_SESSION['authRequest'] = serialize($authRequest);
    } else {
        $authRequest = unserialize($_SESSION['authRequest']);
    }

    if (!array_key_exists('uid', $_SESSION)) {
        $response = $response
            ->withStatus(301)
            ->withHeader('Location', 'login.php?callback=authorize.php');
    } elseif (!array_key_exists('approved', $_SESSION)) {
        $userRepository = new UserRepository();

        $authRequest->setUser(
            $userRepository->getUserEntityById($_SESSION['uid'])
        );

        $_SESSION['authRequest'] = serialize($authRequest);

        $response = $response
            ->withStatus(301)
            ->withHeader(
                'Location',
                'approve.php?scope='.urlencode(implode(',',
                    array_map(
                        fn($scope) => $scope->getIdentifier(), $authRequest->getScopes())
                )).'&callback=authorize.php'
            );
    } else {
        $authRequest->setAuthorizationApproved(true);

        $response = $server->completeAuthorizationRequest($authRequest, $response);

        session_destroy();
    }
} catch (OAuthServerException $exception) {

    $response = $exception->generateHttpResponse($response);

} catch (Exception $exception) {

    $response = $response->withStatus(500);
}

require_once 'output.php';