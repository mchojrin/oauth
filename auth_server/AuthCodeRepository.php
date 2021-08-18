<?php

class AuthCodeRepository implements \League\OAuth2\Server\Repositories\AuthCodeRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function getNewAuthCode()
    {
        return new AuthCodeEntity();
    }

    /**
     * @inheritDoc
     */
    public function persistNewAuthCode(\League\OAuth2\Server\Entities\AuthCodeEntityInterface $authCodeEntity)
    {
        // TODO: Implement persistNewAuthCode() method.
    }

    /**
     * @inheritDoc
     */
    public function revokeAuthCode($codeId)
    {
        // TODO: Implement revokeAuthCode() method.
    }

    /**
     * @inheritDoc
     */
    public function isAuthCodeRevoked($codeId)
    {
        // TODO: Implement isAuthCodeRevoked() method.
    }
}