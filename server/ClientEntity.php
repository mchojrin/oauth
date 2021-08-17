<?php

class ClientEntity implements \League\OAuth2\Server\Entities\ClientEntityInterface
{
    use \League\OAuth2\Server\Entities\Traits\ClientTrait;
    use \League\OAuth2\Server\Entities\Traits\EntityTrait;

    public function __construct()
    {
        $this->setIdentifier(uniqid());
    }
    /**
     * @inheritDoc
     */
    public function getRedirectUri()
    {
        return getenv('CLIENT_REDIRECT_URI');
    }
}