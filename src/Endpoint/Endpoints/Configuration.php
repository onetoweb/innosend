<?php

namespace Onetoweb\Innosend\Endpoint\Endpoints;

use Onetoweb\Innosend\Endpoint\AbstractEndpoint;

/**
 * Configuration Endpoint.
 */
class Configuration extends AbstractEndpoint
{
    /**
     * @return array
     */
    public function get(): array
    {
        return $this->client->get('/integration/webshopapi/configuration');
    }
}
