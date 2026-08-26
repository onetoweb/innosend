.. _top:
.. title:: Shipment

`Back to index <index.rst>`_

========
Shipment
========

.. contents::
    :local:


List shipments
``````````````
List shipments with optional filtering, searching and sorting.

.. code-block:: php
    
    // optional query
    $query = [
        'order_number' => '',
        'shipment_type' => '',
        'tracking_code' => '',
        'receiver_name' => '',
        'receiver_country' => '',
        'courier_service_class' => '',
        'status' => '',
        'is_return' => '',
        'created_from' => '',
        'created_to' => '',
        'sort' => '',
        'search' => '',
        'order_uuid' => '',
        'expand' => '', // Comma-separated list of fields to expand: order, cost_items, invoice_items, return_reasons
        'page' => 1,
        'page_size' => 25,
    ];
    $result = $client->shipment->list($query);


Create shipments (synchronous)
``````````````````````````````
Create shipments for multiple orders.

.. code-block:: php
    
    $orderUuids = [
        '3fa85f64-5717-4562-b3fc-2c963f66afa6'
    ];
    $result = $client->shipment->bulkCreate($orderUuids);


Create shipments (synchronous)
``````````````````````````````
Create shipments for one or more orders.

.. code-block:: php
    
    $orderUuid = '3fa85f64-5717-4562-b3fc-2c963f66afa6';
    $result = $client->shipment->create($orderUuid);


Get shipment creation progress
``````````````````````````````
Poll progress of shipment creation.

.. code-block:: php
    
    $taskId = '3fa85f64-5717-4562-b3fc-2c963f66afa6';
    $result = $client->shipment->progress($taskId);


Download labels for multiple shipments
``````````````````````````````````````
Download the shipping labels of multiple shipments, merged into one PDF.

.. code-block:: php
    
    $data = [
        'paper_format' => 'a6',
        'positions' => [
            'additionalProp1' => true,
            'additionalProp2' => true,
            'additionalProp3' => true
        ],
        'shipment_uuids' => [
            '3fa85f64-5717-4562-b3fc-2c963f66afa6'
        ]
    ];
    
    $result = $client->shipment->labels($data);


Download export documents for multiple shipments
````````````````````````````````````````````````
Download the export documents (commercial invoices) of multiple shipments, merged into one PDF.

.. code-block:: php
    
    $orderUuids = [
        '3fa85f64-5717-4562-b3fc-2c963f66afa6'
    ];
    $result = $client->shipment->exportDocs($orderUuids);


Get a shipment
``````````````
Get a single shipment by UUID.

.. code-block:: php
    
    $uuid = '3fa85f64-5717-4562-b3fc-2c963f66afa6';
    $result = $client->shipment->get($uuid);


Cancel and delete a shipment
````````````````````````````
Cancel the shipment at the carrier and delete it.

.. code-block:: php
    
    $uuid = '3fa85f64-5717-4562-b3fc-2c963f66afa6';
    $result = $client->shipment->delete($uuid);


Create a return shipment
````````````````````````
Create a return shipment for an existing shipment. Returns the new label PDF.

.. code-block:: php
    
    $uuid = '3fa85f64-5717-4562-b3fc-2c963f66afa6';
    $result = $client->shipment->return($uuid);


List packages of a shipment
```````````````````````````
List packages for a shipment.

.. code-block:: php
    
    $shipmentUuid = '3fa85f64-5717-4562-b3fc-2c963f66afa6';
    $result = $client->shipment->packages($shipmentUuid);


Get a package
`````````````
Get a package by tracking code.

.. code-block:: php
    
    $shipmentUuid = '3fa85f64-5717-4562-b3fc-2c963f66afa6';
    $trackingCode = '3fa85f64-5717-4562-b3fc-2c963f66afa6';
    $result = $client->shipment->package($shipmentUuid, $trackingCode);


Download the labels of a shipment
`````````````````````````````````
Download all of a shipment's package labels merged into a single PDF.

.. code-block:: php
    
    $shipmentUuid = '3fa85f64-5717-4562-b3fc-2c963f66afa6';
    $result = $client->shipment->label($shipmentUuid);


Download a package label
````````````````````````
Download a single package's shipping label PDF.

.. code-block:: php
    
    $shipmentUuid = '3fa85f64-5717-4562-b3fc-2c963f66afa6';
    $trackingCode = '3fa85f64-5717-4562-b3fc-2c963f66afa6';
    $result = $client->shipment->packageLabel($shipmentUuid, $trackingCode);


Download the export document of a shipment
``````````````````````````````````````````
Download the shipment's export document (commercial invoice) PDF.

.. code-block:: php
    
    $shipmentUuid = '3fa85f64-5717-4562-b3fc-2c963f66afa6';
    $result = $client->shipment->exportDoc($shipmentUuid);


Download a package export document
``````````````````````````````````
Download a single package's export document PDF.

.. code-block:: php
    
    $shipmentUuid = '3fa85f64-5717-4562-b3fc-2c963f66afa6';
    $trackingCode = '3fa85f64-5717-4562-b3fc-2c963f66afa6';
    $result = $client->shipment->packageExportDoc($shipmentUuid, $trackingCode);


List tracking events of a package
`````````````````````````````````
List tracking events for a package.

.. code-block:: php
    
    $shipmentUuid = '3fa85f64-5717-4562-b3fc-2c963f66afa6';
    $trackingCode = '3fa85f64-5717-4562-b3fc-2c963f66afa6';
    $result = $client->shipment->trackingEvents($shipmentUuid, $trackingCode);


`Back to top <#top>`_