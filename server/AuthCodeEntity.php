<?php

class AuthCodeEntity implements \League\OAuth2\Server\Entities\AuthCodeEntityInterface
{

    private \League\OAuth2\Server\Entities\ClientEntityInterface $clientEntity;

    /**
     * @inheritDoc
     */
    public function getRedirectUri()
    {
        // TODO: Implement getRedirectUri() method.
    }

    /**
     * @inheritDoc
     */
    public function setRedirectUri($uri)
    {
        // TODO: Implement setRedirectUri() method.
    }

    /**
     * @inheritDoc
     */
    public function getIdentifier()
    {
        // TODO: Implement getIdentifier() method.
    }

    /**
     * @inheritDoc
     */
    public function setIdentifier($identifier)
    {
        // TODO: Implement setIdentifier() method.
    }

    /**
     * @inheritDoc
     */
    public function getExpiryDateTime()
    {
        // TODO: Implement getExpiryDateTime() method.
    }

    /**
     * @inheritDoc
     */
    public function setExpiryDateTime(DateTimeImmutable $dateTime)
    {
        // TODO: Implement setExpiryDateTime() method.
    }

    /**
     * @inheritDoc
     */
    public function setUserIdentifier($identifier)
    {
        // TODO: Implement setUserIdentifier() method.
    }

    /**
     * @inheritDoc
     */
    public function getUserIdentifier()
    {
        // TODO: Implement getUserIdentifier() method.
    }

    /**
     * @inheritDoc
     */
    public function getClient() : \League\OAuth2\Server\Entities\ClientEntityInterface
    {
        return $this->clientEntity;
    }

    /**
     * @inheritDoc
     */
    public function setClient(\League\OAuth2\Server\Entities\ClientEntityInterface $client)
    {
        $this->clientEntity = $client;
    }

    /**
     * @inheritDoc
     */
    public function addScope(\League\OAuth2\Server\Entities\ScopeEntityInterface $scope)
    {
        // TODO: Implement addScope() method.
    }

    /**
     * @inheritDoc
     */
    public function getScopes()
    {
        // TODO: Implement getScopes() method.
    }
}