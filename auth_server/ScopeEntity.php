<?php

class ScopeEntity implements \League\OAuth2\Server\Entities\ScopeEntityInterface
{
    /**
     * @inheritDoc
     */
    public function getIdentifier()
    {
        return 'protected_resource_access';
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return json_encode(['id' => $this->getIdentifier()]);
    }

    public function __toString()
    {
        return 'Access protected resource';
    }
}