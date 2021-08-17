<?php

class UserRepository implements \League\OAuth2\Server\Repositories\UserRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function getUserEntityByUserCredentials($username, $password, $grantType, \League\OAuth2\Server\Entities\ClientEntityInterface $clientEntity)
    {
        $userEntity = new UserEntity();
        $userEntity->setIdentifier(uniqid());

        return $userEntity;
    }
}