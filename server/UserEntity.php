<?php

class UserEntity implements \League\OAuth2\Server\Entities\UserEntityInterface
{

    /**
     * @inheritDoc
     */
    public function getIdentifier()
    {
        return uniqid();
    }
}