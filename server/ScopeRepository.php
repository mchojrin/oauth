<?php

class ScopeRepository implements \League\OAuth2\Server\Repositories\ScopeRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function getScopeEntityByIdentifier($identifier)
    {
        return new ScopeEntity();
    }

    /**
     * @inheritDoc
     */
    public function finalizeScopes(array $scopes, $grantType, \League\OAuth2\Server\Entities\ClientEntityInterface $clientEntity, $userIdentifier = null)
    {
        // TODO: Implement finalizeScopes() method.
    }
}