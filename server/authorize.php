<?php

use League\OAuth2\Server\Exception\OAuthServerException;

require_once 'bootstrap.php';

try {

    // Validate the HTTP request and return an AuthorizationRequest object.
    $authRequest = $server->validateAuthorizationRequest($request);

    // The auth request object can be serialized and saved into a user's session.
    // You will probably want to redirect the user at this point to a login endpoint.

    // Once the user has logged in set the user on the AuthorizationRequest
    $authRequest->setUser(new UserEntity()); // an instance of UserEntityInterface

    // At this point you should redirect the user to an authorization page.
    // This form will ask the user to approve the client and the scopes requested.

    // Once the user has approved or denied the client update the status
    // (true = approved, false = denied)
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
