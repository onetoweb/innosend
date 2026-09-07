<?php

namespace Onetoweb\Innosend\Endpoint\Endpoints;

use Onetoweb\Innosend\Endpoint\AbstractEndpoint;

/**
 * Service Endpoint.
 */
class Service extends AbstractEndpoint
{
    /**
     * @param array $query = []
     * 
     * @return array
     */
    public function couriers(array $query = []): array
    {
        return $this->client->get('/services/couriers', $query);
    }
    
    /**
     * @return array
     */
    public function couriersShippingConfig(): array
    {
        return $this->client->get('/services/couriers/shipping-config');
    }
    
    /**
     * @return array
     */
    public function pickupPointsCouriers(): array
    {
        return $this->client->get('/services/pickup-points/couriers');
    }
    
    /**
     * @return array
     */
    public function searchPickupPoints(array $query): array
    {
        return $this->client->get('/services/pickup-points', $query);
    }
}
