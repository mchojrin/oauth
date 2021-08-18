<?php

require_once 'bootstrap.php';

$response = $middleware($request, $response, function (\Psr\Http\Message\RequestInterface $request, \Psr\Http\Message\ResponseInterface $response) {

    return $response
        ->withStatus(200)
        ->withBody(\Nyholm\Psr7\Stream::create(json_encode(
            [
                'Resource' => 'A protected resource'
            ])));
});

require_once 'output.php';