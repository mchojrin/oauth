<?php

require_once 'vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();

$clientRepository = new ClientRepository();
$scopeRepository = new ScopeRepository();
$accessTokenRepository = new AccessTokenRepository();
$authCodeRepository = new AuthCodeRepository();
$refreshTokenRepository = new RefreshTokenRepository();

$privateKey = 'file://'.__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'private.key';
$encryptionKey = 'w94BP8Vp+hIg7G7MlRyzkJg31tkwjL4J3Z4Rmh8jisw='; // generate using base64_encode(random_bytes(32))

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
     new \DateInterval('PT10M')
 );

$grant->setRefreshTokenTTL(new \DateInterval('P1M'));

$grant->disableRequireCodeChallengeForPublicClients();

$server->enableGrantType(
    $grant,
    new \DateInterval('PT1H')
);

$psr17Factory = new Nyholm\Psr7\Factory\Psr17Factory();

$creator = new Nyholm\Psr7Server\ServerRequestCreator(
    $psr17Factory,
    $psr17Factory,
    $psr17Factory,
    $psr17Factory
);

$request = $creator->fromGlobals();
$response = new GuzzleHttp\Psr7\Response();

session_start();