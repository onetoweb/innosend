<?php

namespace Onetoweb\Innosend\Endpoint\Endpoints;

use Onetoweb\Innosend\Endpoint\AbstractEndpoint;

/**
 * Shipment Endpoint.
 */
class Shipment extends AbstractEndpoint
{
    /**
     * @param array $query = []
     * 
     * @return array
     */
    public function list(array $query = []): array
    {
        return $this->client->get('/shipments', $query);
    }
    
    /**
     * @param array $orderUuids
     * 
     * @return array
     */
    public function bulkCreate(array $orderUuids): array
    {
        $data = [
            'order_uuids' => $orderUuids
        ];
        
        return $this->client->post('/shipments/bulk-create', $data);
    }
    
    /**
     * @param string $orderUuid
     * 
     * @return array
     */
    public function create(string $orderUuid): array
    {
        $data = [
            'order_uuid' => $orderUuid
        ];
        
        return $this->client->post('/shipments/create', $data);
    }
    
    /**
     * @param string $taskId
     * 
     * @return array
     */
    public function progress(string $taskId): array
    {
        return $this->client->get("/shipments/create/progress/$taskId");
    }
    
    /**
     * @param array $data
     * 
     * @return array
     */
    public function labels(array $data): array
    {
        return $this->client->post('/shipments/labels', $data);
    }
    
    /**
     * @param array $shipmentUuids
     * 
     * @return array
     */
    public function exportDocs(array $shipmentUuids): array
    {
        $data = [
            'shipment_uuids' => $shipmentUuids
        ];
        
        return $this->client->post('/shipments/export-docs', $data);
    }
    
    /**
     * @param string $uuid
     * 
     * @return array
     */
    public function get(string $uuid): array
    {
        return $this->client->get("/shipments/$uuid");
    }
    
    /**
     * @param string $uuid
     * 
     * @return array
     */
    public function delete(string $uuid): array
    {
        return $this->client->delete("/shipments/$uuid");
    }
    
    /**
     * @param string $uuid
     * 
     * @return array
     */
    public function return(string $uuid): array
    {
        return $this->client->post("/shipments/$uuid/return");
    }
    
    /**
     * @param string $shipmentUuid
     * @param string $trackingCode
     * 
     * @return array
     */
    public function package(string $shipmentUuid, string $trackingCode): array
    {
        return $this->client->get("/shipments/$shipmentUuid/packages/$trackingCode");
    }
    
    /**
     * @param string $shipmentUuid
     * 
     * @return array
     */
    public function label(string $shipmentUuid): array
    {
        return $this->client->get("/shipments/$shipmentUuid/label");
    }
    
    /**
     * @param string $shipmentUuid
     * @param string $trackingCode
     * 
     * @return array
     */
    public function packageLabel(string $shipmentUuid, string $trackingCode): array
    {
        return $this->client->get("/shipments/$shipmentUuid/packages/$trackingCode/label");
    }
    
    /**
     * @param string $shipmentUuid
     * 
     * @return array
     */
    public function exportDoc(string $shipmentUuid): array
    {
        return $this->client->get("/shipments/$shipmentUuid/export-doc");
    }
    
    /**
     * @param string $shipmentUuid
     * @param string $trackingCode
     * 
     * @return array
     */
    public function packageExportDoc(string $shipmentUuid, string $trackingCode): array
    {
        return $this->client->get("/shipments/$shipmentUuid/packages/$trackingCode/export-doc");
    }
    
    /**
     * @param string $shipmentUuid
     * @param string $trackingCode
     * 
     * @return array
     */
    public function trackingEvents(string $shipmentUuid, string $trackingCode): array
    {
        return $this->client->get("/shipments/$shipmentUuid/packages/$trackingCode/tracking-events");
    }
}
