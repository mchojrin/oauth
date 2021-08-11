<?php

class ClientEntity implements \League\OAuth2\Server\Entities\ClientEntityInterface
{

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
    public function getName()
    {
        // TODO: Implement getName() method.
    }

    /**
     * @inheritDoc
     */
    public function getRedirectUri()
    {
        return getenv('CLIENT_REDIRECT_URI');
    }

    /**
     * @inheritDoc
     */
    public function isConfidential()
    {
        // TODO: Implement isConfidential() method.
    }
}