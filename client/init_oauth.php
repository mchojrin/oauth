<?php

require_once 'bootstrap.php';

$authorizationUrl = $provider->getAuthorizationUrl(
    ['scope' => 'protected_resource_access']
);

$_SESSION['oauth2state'] = $provider->getState();

header('Location: ' . $authorizationUrl);