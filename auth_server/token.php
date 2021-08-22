<?php

use League\OAuth2\Server\Exception\OAuthServerException;

require_once 'bootstrap.php';

try {

    $response = $server->respondToAccessTokenRequest($request, $response);

} catch (\League\OAuth2\Server\Exception\OAuthServerException $exception) {

    $response = $exception->generateHttpResponse($response);

} catch (\Exception $exception) {

    $body = new Stream(fopen('php://temp', 'r+'));
    $body->write($exception->getMessage());

    $response = $response->withStatus(500)->withBody($body);
}

require_once 'output.php';