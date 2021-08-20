<?php

class ClientEntity implements \League\OAuth2\Server\Entities\ClientEntityInterface
{
    use \League\OAuth2\Server\Entities\Traits\ClientTrait;
    use \League\OAuth2\Server\Entities\Traits\EntityTrait;

    public function __construct()
    {
        $this->name = 'The client App';
        $this->setIdentifier(uniqid());
        $this->redirectUri = getenv('CLIENT_REDIRECT_URI');
    }
}