<?php

require_once 'vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();

$provider = new \League\OAuth2\Client\Provider\GenericProvider([
    'clientId'                => getenv('OAUTH_CLIENT_ID'),    // The client ID assigned to you by the provider
    'clientSecret'            => getenv('OAUTH_CLIENT_SECRET'),    // The client password assigned to you by the provider
    'redirectUri'             => getenv('CLIENT_REDIRECT_URI'),
    'urlAuthorize'            => getenv('AUTHORIZATION_SERVER_AUTHORIZE_URL'),
    'urlAccessToken'          => getenv('AUTHORIZATION_SERVER_ACCESS_TOKEN_URL'),
    'urlResourceOwnerDetails' => getenv('RESOURCE_OWNER_URL'),
]);

session_start();