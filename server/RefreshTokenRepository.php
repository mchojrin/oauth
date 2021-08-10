<?php

class RefreshTokenRepository implements \League\OAuth2\Server\Repositories\RefreshTokenRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function getNewRefreshToken()
    {
        // TODO: Implement getNewRefreshToken() method.
    }

    /**
     * @inheritDoc
     */
    public function persistNewRefreshToken(\League\OAuth2\Server\Entities\RefreshTokenEntityInterface $refreshTokenEntity)
    {
        // TODO: Implement persistNewRefreshToken() method.
    }

    /**
     * @inheritDoc
     */
    public function revokeRefreshToken($tokenId)
    {
        // TODO: Implement revokeRefreshToken() method.
    }

    /**
     * @inheritDoc
     */
    public function isRefreshTokenRevoked($tokenId)
    {
        // TODO: Implement isRefreshTokenRevoked() method.
    }
}