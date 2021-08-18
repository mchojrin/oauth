<?php

require_once 'vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();

$provider = new \League\OAuth2\Client\Provider\GenericProvider([
    'clientId'                => getenv('OAUTH_CLIENT_ID'),    // The client ID assigned to you by the provider
    'clientSecret'            => getenv('OAUTH_CLIENT_SECRET'),    // The client password assigned to you by the provider
    'redirectUri'             => getenv('CLIENT_REDIRECT_URI'),
    'urlAuthorize'            => getenv('AUTHORIZATION_SERVER_URL'),
    'urlAccessToken'          => getenv('AUTHORIZATION_SERVER_ACCESS_TOKEN_URL'),
    'urlResourceOwnerDetails' => getenv('RESOURCE_OWNER_URL'),
]);

// If we don't have an authorization code then get one
if (!isset($_GET['code'])) {

    // Fetch the authorization URL from the provider; this returns the
    // urlAuthorize option and generates and applies any necessary parameters
    // (e.g. state).
    $authorizationUrl = $provider->getAuthorizationUrl();

    // Get the state generated for you and store it to the session.
    $_SESSION['oauth2state'] = $provider->getState();

    // Redirect the user to the authorization URL.
    header('Location: ' . $authorizationUrl);
    exit;

// Check given state against previously stored one to mitigate CSRF attack
} elseif (empty($_GET['state']) || (isset($_SESSION['oauth2state']) && $_GET['state'] !== $_SESSION['oauth2state'])) {

    if (isset($_SESSION['oauth2state'])) {
        unset($_SESSION['oauth2state']);
    }

    exit('Invalid state');

} else {

    try {

        // Try to get an access token using the authorization code grant.
        $accessToken = $provider->getAccessToken('authorization_code', [
            'code' => urldecode($_GET['code']),
        ]);

        // We have an access token, which we may use in authenticated
        // requests against the service provider's API.
        ?>
        <table>
            <tr>
                <th>Access token</th>
                <td><?php echo $accessToken->getToken(); ?></td>
            </tr>
            <tr>
                <th>Refresh Token</th>
                <td><?php echo $accessToken->getRefreshToken(); ?></td>
            </tr>
            <tr>
                <th>Expired in</th>
                <td><?php echo $accessToken->getExpires(); ?></td>
            </tr>
            <tr>
                <th>Already expired?</th>
                <td><?php echo ($accessToken->hasExpired() ? 'expired' : 'not expired') ?></td>
            </tr>
        </table>
<?php

        // Using the access token, we may look up details about the
        // resource owner.
        ?>
        <h1>Resource owner information</h1>
<?php
        $resourceOwner = $provider->getResourceOwner($accessToken);

        var_export($resourceOwner->toArray());
?>
        <h1>A resource only accessible via OAuth</h1>
<?php
        // The provider provides a way to get an authenticated API request for
        // the service, using the access token; it returns an object conforming
        // to Psr\Http\Message\RequestInterface.
        $request = $provider->getAuthenticatedRequest(
            'GET',
            getenv('RESOURCE_SERVER_URL'),
            $accessToken
        );
        $httpClient = new \GuzzleHttp\Client();
        $response = $httpClient->send($request);

        echo $response->getBody();
    } catch (\League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {

        // Failed to get the access token or user details.
        exit($e->getMessage());
    }
}