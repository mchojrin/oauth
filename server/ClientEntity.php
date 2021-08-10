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
        return 'http://localhost:8000/client/index.php';
    }

    /**
     * @inheritDoc
     */
    public function isConfidential()
    {
        // TODO: Implement isConfidential() method.
    }
}