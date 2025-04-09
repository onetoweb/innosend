<?php

namespace Onetoweb\Innosend\Endpoint\Endpoints;

use Onetoweb\Innosend\Endpoint\AbstractEndpoint;

/**
 * Shipment Endpoint.
 */
class Shipment extends AbstractEndpoint
{
    /**
     * @param array $data
     * 
     * @return array
     */
    public function create(array $data): array
    {
        return $this->client->post('/integration/webshopapi/shipment', $data);
    }
}
