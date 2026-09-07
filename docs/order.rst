.. _top:
.. title:: Order

`Back to index <index.rst>`_

=====
Order
=====

.. contents::
    :local:


List orders
```````````
List orders with optional filtering, searching and sorting.

.. code-block:: php
    
    // optional query
    $query = [
        'order_number' => '',
        'receiver_name' => '',
        'receiver_country' => '',
        'receiver_city' => '',
        'status' => '',
        'source_type' => '',
        'courier_service_class' => '',
        'external_status' => '',
        'has_shipments' => '',
        'order_date_from' => '',
        'order_date_to' => '',
        'created_from' => '',
        'created_to' => '',
        'sort' => '',
        'search' => '',
        'platform_uuid' => '',
        'include_gdpr_data' => true,
        'page' => 1,
        'page_size' => 25,
    ];
    
    $result = $client->order->list($query);


Create an order
```````````````

.. code-block:: php
    
    $data = [
        'courier_uuid' => '3fa85f64-5717-4562-b3fc-2c963f66afa6',
        'shipment_type' => 'string',
        'courier_fields' => [
        ],
        'receiver' => [
            'name' => 'string',
            'company_name' => 'string',
            'address_1' => 'string',
            'housenumber' => 'string',
            'address_2' => 'string',
            'zipcode' => 'string',
            'city' => 'string',
            'country' => 'NL',
            'state' => 'string',
            'email' => 'user@example.com',
            'phone' => 'string'
        ],
        'order_number' => 'string',
        'order_date' => '2026-08-26T11:10:08.282Z',
        'currency' => 'EUR',
        'pickup_point' => [
            'pickup_point_id' => 'string',
            'pickup_point_name' => 'string',
            'city' => 'string',
            'country' => 'string',
            'address' => 'string',
            'zipcode' => 'string'
        ],
        'items' => [
            [
                'description' => 'Product description for customs',
                'hs_code' => '6109100010',
                'name' => 'Product name',
                'product_country' => 'NL',
                'quantity' => 2,
                'sku' => 'SKU-001',
                'unit_price_inc_btw' => 29.95,
                'weight' => 500
            ]
        ],
        'packages' => [
            [
                'height' => 10,
                'length' => 30,
                'weight' => 1500,
                'width' => 20
            ]
        ]
    ];
    $result = $client->order->create($data);


Get an order
````````````
Get a single order by UUID.

.. code-block:: php
    
    $id = 'da5bc185-5e54-40d3-969c-482850f0b4ef';
    $result = $client->order->get($id);


Update an order
```````````````

.. code-block:: php
    
    $id = 'da5bc185-5e54-40d3-969c-482850f0b4ef';
    $data = [
        'status' => 'string',
        'status_info' => [
            [
                'additionalProp1' => [
                ]
            ]
        ],
        'courier_uuid' => '3fa85f64-5717-4562-b3fc-2c963f66afa6',
        'shipment_type' => 'string',
        'courier_fields' => [
            'additionalProp1' => [
            ]
        ],
        'checkout_courier' => 'string',
        'order_number' => 'string',
        'order_date' => '2026-08-26T11:28:04.290Z',
        'currency' => 'string',
        'total_amount' => 0,
        'receiver' => [
            'name' => 'string',
            'company_name' => 'string',
            'address_1' => 'string',
            'housenumber' => 'string',
            'address_2' => 'string',
            'zipcode' => 'string',
            'city' => 'string',
            'country' => 'string',
            'state' => 'string',
            'email' => 'string',
            'phone' => 'string'
        ],
        'items' => [
            [
                'uuid' => '3fa85f64-5717-4562-b3fc-2c963f66afa6',
                'name' => 'string',
                'quantity' => 1,
                'weight' => 0,
                'unit_price_inc_btw' => 0,
                'sku' => 'string',
                'product_country' => 'string',
                'description' => 'string',
                'hs_code' => 'string',
                'ean_code' => 'string'
            ]
        ],
        'packages' => [
            [
                'uuid' => '3fa85f64-5717-4562-b3fc-2c963f66afa6',
                'weight' => 0,
                'length' => 0,
                'width' => 0,
                'height' => 0
            ]
        ],
        'pickup_point' => [
            'pickup_point_id' => 'string',
            'pickup_point_name' => 'string',
            'city' => 'string',
            'country' => 'string',
            'address' => 'string',
            'zipcode' => 'string'
        ]
    ];
    $result = $client->order->update($id, $data);


Delete an order
```````````````

.. code-block:: php
    
    $id = 'da5bc185-5e54-40d3-969c-482850f0b4ef';
    $result = $client->order->delete($id);


`Back to top <#top>`_