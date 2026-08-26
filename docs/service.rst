.. _top:
.. title:: Service

`Back to index <index.rst>`_

=======
Service
=======

.. contents::
    :local:


List couriers
`````````````
List the organisation's couriers.

.. code-block:: php
    
    // optional query
    $query = [
        'page' => 1,
        'page_size' => 25,
    ];
    $result = $client->service->couriers($query);


List courier shipping configuration
```````````````````````````````````
Available shipment types and options for each active courier.

.. code-block:: php
    
    $result = $client->service->couriersShippingConfig();


List couriers with pickup points
````````````````````````````````
List active couriers that support pickup point delivery.

.. code-block:: php
    
    $result = $client->service->pickupPointsCouriers();


Search pickup points
````````````````````
Search pickup points by location.

.. code-block:: php
    
    // optional query
    $query = [
        'zipcode' => '',
        'country' => 'NL',
        'city' => '',
        'street' => '',
        'latitude' => '',
        'longitude' => '',
        'courier_uuid' => '',
        'courier_group' => '',
    ];
    $result = $client->service->searchPickupPoints($query);


`Back to top <#top>`_