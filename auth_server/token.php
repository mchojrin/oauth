<?php

use League\OAuth2\Server\Exception\OAuthServerException;

require_once 'bootstrap.php';

try {

    // Try to respond to the request
    $response = $server->respondToAccessTokenRequest($request, $response);

} catch (\League\OAuth2\Server\Exception\OAuthServerException $exception) {

    // All instances of OAuthServerException can be formatted into a HTTP response
    $response = $exception->generateHttpResponse($response);

} catch (\Exception $exception) {

    // Unknown exception
    $body = new Stream(fopen('php://temp', 'r+'));
    $body->write($exception->getMessage());

    $response = $response->withStatus(500)->withBody($body);
}

http_response_code($response->getStatusCode());
foreach ($response->getHeaders() as $name => $values) {
    header("$name: ".implode(',', $values));
}
echo $response->getBody();