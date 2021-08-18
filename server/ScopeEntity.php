<?php

class ScopeEntity implements \League\OAuth2\Server\Entities\ScopeEntityInterface
{

    /**
     * @inheritDoc
     */
    public function getIdentifier()
    {
        return uniqid();
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return json_encode(['id' => $this->getIdentifier()]);
    }
}