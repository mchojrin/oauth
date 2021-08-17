<?php

use League\OAuth2\Server\Exception\OAuthServerException;

require_once 'bootstrap.php';

try {

    // Validate the HTTP request and return an AuthorizationRequest object.
    $authRequest = $server->validateAuthorizationRequest($request);

    // The auth request object can be serialized and saved into a user's session.

    $_SESSION['authRequest'] = serialize($authRequest);

    // You will probably want to redirect the user at this point to a login endpoint.

    if (!array_key_exists('username', $_SESSION)) {
        header('Location: login.html');
        die;
    }

    $client = new ClientEntity();
    $authRequest->setClient($client);
    $authRequest->setRedirectUri($client->getRedirectUri());
    $authRequest->setScopes($scopeRepository->getScopeEntityByIdentifier(1));

    $userRepository = new UserRepository();

    // Once the user has logged in set the user on the AuthorizationRequest
    $authRequest->setUser(
        $userRepository->getUserEntityByUserCredentials(
            $_SESSION['username'],
            $_SESSION['password'],
            $grant,
            $client
        )
    ); // an instance of UserEntityInterface

    // At this point you should redirect the user to an authorization page.
    // This form will ask the user to approve the client and the scopes requested.

    if (!array_key_exists('approved', $_SESSION)) {
        header('Location: approve.html');
        die;
    }

    // Once the user has approved or denied the client update the status
    // (true = approved, false = denied)
    $authRequest = unserialize($_SESSION['authRequest']);
    $authRequest->setAuthorizationApproved(true);

    // Return the HTTP redirect response
    $response = $server->completeAuthorizationRequest($authRequest, $response);

} catch (OAuthServerException $exception) {

    // All instances of OAuthServerException can be formatted into a HTTP response
    $response = $exception->generateHttpResponse($response);

} catch (Exception $exception) {

    // Unknown exception
    $response = $response->withStatus(500);
}

http_response_code($response->getStatusCode());
foreach ($response->getHeaders() as $name => $values) {
    header("$name: ".implode(',', $values));
}
echo $response->getBody();
