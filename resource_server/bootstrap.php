<?php

require_once 'vendor/autoload.php';

// Init our repositories
$accessTokenRepository = new AccessTokenRepository(); // instance of AccessTokenRepositoryInterface

// Path to authorization server's public key
$publicKeyPath = 'file://' . __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'public.key';

// Setup the authorization server
$server = new \League\OAuth2\Server\ResourceServer(
    $accessTokenRepository,
    $publicKeyPath
);

$middleware = new \League\OAuth2\Server\Middleware\ResourceServerMiddleware($server);

$psr17Factory = new \Nyholm\Psr7\Factory\Psr17Factory();

$creator = new \Nyholm\Psr7Server\ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory  // StreamFactory
);

$request = $creator->fromGlobals();
$response = new GuzzleHttp\Psr7\Response();