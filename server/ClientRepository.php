<?php

class ClientRepository implements \League\OAuth2\Server\Repositories\ClientRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function getClientEntity($clientIdentifier)
    {
        $theClient = new ClientEntity();
        $theClient->setIdentifier($clientIdentifier);

        return $theClient;
    }

    /**
     * @inheritDoc
     */
    public function validateClient($clientIdentifier, $clientSecret, $grantType)
    {
        return true;
    }
}