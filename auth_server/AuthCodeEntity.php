<?php

class AuthCodeEntity implements \League\OAuth2\Server\Entities\AuthCodeEntityInterface
{
    private \League\OAuth2\Server\Entities\ClientEntityInterface $clientEntity;

    use \League\OAuth2\Server\Entities\Traits\EntityTrait;
    use \League\OAuth2\Server\Entities\Traits\TokenEntityTrait;
    use \League\OAuth2\Server\Entities\Traits\AuthCodeTrait;
}