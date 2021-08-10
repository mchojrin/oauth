<?php

class ClientRepository implements \League\OAuth2\Server\Repositories\ClientRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function getClientEntity($clientIdentifier)
    {
        return new ClientEntity();
    }

    /**
     * @inheritDoc
     */
    public function validateClient($clientIdentifier, $clientSecret, $grantType)
    {
        return true;
    }
}