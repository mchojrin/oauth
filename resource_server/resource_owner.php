<?php

require_once 'bootstrap.php';

$response = $middleware($request, $response, function (\Psr\Http\Message\RequestInterface $request, \Psr\Http\Message\ResponseInterface $response) {

    return $response
        ->withStatus(200)
        ->withBody(\Nyholm\Psr7\Stream::create(json_encode(
            [
                'Owner' => [
                    'Mauro',
                    'oauth_info' => [
                        'access_token_id' => $request->getAttribute('oauth_access_token_id'),
                        'oauth_client_id' => $request->getAttribute('oauth_client_id'),
                        'oauth_user_id' => $request->getAttribute('oauth_user_id'),
                        'oauth_scopes' => $request->getAttribute('oauth_scopes'),
                    ],
                ]
            ])));
});

require_once 'output.php';