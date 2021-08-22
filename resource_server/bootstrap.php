<?php

require_once 'vendor/autoload.php';

$accessTokenRepository = new AccessTokenRepository(); // instance of AccessTokenRepositoryInterface

$publicKeyPath = 'file://' . __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'public.key';

$server = new \League\OAuth2\Server\ResourceServer(
    $accessTokenRepository,
    $publicKeyPath
);

$middleware = new \League\OAuth2\Server\Middleware\ResourceServerMiddleware($server);

$psr17Factory = new \Nyholm\Psr7\Factory\Psr17Factory();

$creator = new \Nyholm\Psr7Server\ServerRequestCreator(
    $psr17Factory,
    $psr17Factory,
    $psr17Factory,
    $psr17Factory
);

$request = $creator->fromGlobals();
$response = new GuzzleHttp\Psr7\Response();