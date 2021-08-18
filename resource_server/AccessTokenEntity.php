<?php

class AccessTokenEntity implements \League\OAuth2\Server\Entities\AccessTokenEntityInterface
{
    use \League\OAuth2\Server\Entities\Traits\AccessTokenTrait;
    use \League\OAuth2\Server\Entities\Traits\EntityTrait;
    use \League\OAuth2\Server\Entities\Traits\TokenEntityTrait;
}