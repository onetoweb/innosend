<?php

namespace Onetoweb\Innosend\Endpoint\Endpoints;

use Onetoweb\Innosend\Endpoint\AbstractEndpoint;

/**
 * Tracking Endpoint.
 */
class Tracking extends AbstractEndpoint
{
    /**
     * @param string $trackingCode
     * 
     * @return array
     */
    public function history(string $trackingCode): array
    {
        $query = [
            'tracking_code' => $trackingCode,
        ];
        
        return $this->client->get('/tracking/history', $query);
    }
    
    /**
     * @param string $trackingCode
     * 
     * @return array
     */
    public function deliveryEstimate(string $trackingCode): array
    {
        $query = [
            'tracking_code' => $trackingCode,
        ];
        
        return $this->client->get('/tracking/delivery-estimate', $query);
    }
}
