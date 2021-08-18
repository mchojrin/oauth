<?php

class AccessTokenRepository implements \League\OAuth2\Server\Repositories\AccessTokenRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function getNewToken(\League\OAuth2\Server\Entities\ClientEntityInterface $clientEntity, array $scopes, $userIdentifier = null)
    {
        $accessTokenEntity = new AccessTokenEntity();
        $accessTokenEntity->setClient($clientEntity);

        foreach ($scopes as $scope) {
            $accessTokenEntity->addScope($scope);
        }

        $accessTokenEntity->setUserIdentifier($userIdentifier);

        return $accessTokenEntity;
    }

    /**
     * @inheritDoc
     */
    public function persistNewAccessToken(\League\OAuth2\Server\Entities\AccessTokenEntityInterface $accessTokenEntity)
    {
        // TODO: Implement persistNewAccessToken() method.
    }

    /**
     * @inheritDoc
     */
    public function revokeAccessToken($tokenId)
    {
        // TODO: Implement revokeAccessToken() method.
    }

    /**
     * @inheritDoc
     */
    public function isAccessTokenRevoked($tokenId)
    {
        false;
    }
}