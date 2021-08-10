<?php

require_once '../vendor/autoload.php';

// Init our repositories
$clientRepository = new ClientRepository(); // instance of ClientRepositoryInterface
$scopeRepository = new ScopeRepository(); // instance of ScopeRepositoryInterface
$accessTokenRepository = new AccessTokenRepository(); // instance of AccessTokenRepositoryInterface
$authCodeRepository = new AuthCodeRepository(); // instance of AuthCodeRepositoryInterface
$refreshTokenRepository = new RefreshTokenRepository(); // instance of RefreshTokenRepositoryInterface

$privateKey = 'file://'.__DIR__.DIRECTORY_SEPARATOR.'private.key';
$encryptionKey = 'w94BP8Vp+hIg7G7MlRyzkJg31tkwjL4J3Z4Rmh8jisw='; // generate using base64_encode(random_bytes(32))

// Setup the authorization server
$server = new \League\OAuth2\Server\AuthorizationServer(
    $clientRepository,
    $accessTokenRepository,
    $scopeRepository,
    $privateKey,
    $encryptionKey
);

$grant = new \League\OAuth2\Server\Grant\AuthCodeGrant(
     $authCodeRepository,
     $refreshTokenRepository,
     new \DateInterval('PT10M') // authorization codes will expire after 10 minutes
 );

$grant->setRefreshTokenTTL(new \DateInterval('P1M')); // refresh tokens will expire after 1 month

$grant->disableRequireCodeChallengeForPublicClients();

// Enable the authentication code grant on the server
$server->enableGrantType(
    $grant,
    new \DateInterval('PT1H') // access tokens will expire after 1 hour
);

$psr17Factory = new Nyholm\Psr7\Factory\Psr17Factory();

$creator = new Nyholm\Psr7Server\ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory  // StreamFactory
);

$request = $creator->fromGlobals();
$response = new GuzzleHttp\Psr7\Response();

