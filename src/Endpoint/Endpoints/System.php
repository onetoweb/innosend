<?php

namespace Onetoweb\Innosend\Endpoint\Endpoints;

use Onetoweb\Innosend\Endpoint\AbstractEndpoint;

/**
 * Configuration Endpoint.
 */
class System extends AbstractEndpoint
{
    /**
     * @return array
     */
    public function health(): array
    {
        return $this->client->get('/health');
    }
}
