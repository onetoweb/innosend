<?php

namespace Onetoweb\Innosend\Endpoint\Endpoints;

use Onetoweb\Innosend\Endpoint\AbstractEndpoint;

/**
 * Order Endpoint.
 */
class Order extends AbstractEndpoint
{
    /**
     * @param array $query = []
     * 
     * @return array
     */
    public function list(array $query = []): array
    {
        return $this->client->get('/orders', $query);
    }
    
    /**
     * @param array $data
     * 
     * @return array
     */
    public function create(array $data): array
    {
        return $this->client->post('/orders', $data);
    }
    
    /**
     * @param string $id
     * 
     * @return array
     */
    public function get(string $id): array
    {
        return $this->client->get("/orders/$id");
    }
    
    /**
     * @param string $id
     * @param array $data
     * 
     * @return array
     */
    public function update(string $id, array $data): array
    {
        return $this->client->patch("/orders/$id", $data);
    }
    
    /**
     * @param string $id
     * 
     * @return array
     */
    public function delete(string $id): array
    {
        return $this->client->delete("/orders/$id");
    }
}
