.. _top:
.. title:: Shipment

`Back to index <index.rst>`_

========
Shipment
========

.. contents::
    :local:


Create shipment
```````````````

.. code-block:: php
    
    $shipment = [
        'billing_customer' => [
            'address_1' => 'Peizerweg',
            'address_2' => '',
            'city' => 'Groningen',
            'company_name' => 'Innosend',
            'country' => 'NL',
            'email' => 'example@domain.com',
            'house_number' => '97',
            'name' => 'John Doe',
            'phone' => '1234567890',
            'region' => '',
            'zipcode' => '9727 AJ'
        ],
        'delivery' => [
            'courier' => '/integration/webshopapi/configuration.shipping_methods[0].shipment_id',
            'desired_delivery_date' => '2023-09-22 08:35:00',
            'options' => [
                'age_check' => false,
                'eve_delivery' => false,
                'insurance' => false,
                'no_neighbour' => false,
                'saturday_delivery' => false,
                'signature' => false,
                'undisclosed_sender' => false
            ],
            'return' => false
        ],
        'items' => [
            [
                'code' => '90 204 0482 2',
                'color' => 'yellow',
                'count'=> null,
                'country_origin' => '',
                'description' => 'The Little Prince is a novella by French aristocrat...',
                'ean_code' => '',
                'hs_code' => '',
                'id' => '98726712',
                'price_excl_vat'=> null,
                'price_incl_vat'=> null,
                'price_vat'=> null,
                'price_vat_percentage'=> null,
                'product_image' => 'https://unsplash.it/50',
                'sku_code' => '',
                'title' => 'The Little Prince',
                'weight' => null
            ]
        ],
        'order' => [
            'currency' => 'EUR',
            'date' => '2023-09-22 08:35:00',
            'invoice_number' => 'INV_00001',
            'number' => '00001',
            'price_excl_vat'=> null,
            'price_incl_vat'=> null,
            'price_vat'=> null,
            'price_vat_percentage'=> null,
            'status' => 'ready',
            'total_weight' => null
        ],
        'shipping_customer' => [
            'address_1' => 'Peizerweg',
            'address_2' => '',
            'city' => 'Groningen',
            'company_name' => 'Innosend',
            'country' => 'NL',
            'email' => 'example@domain.com',
            'house_number' => '97',
            'name' => 'John Doe',
            'phone' => '',
            'region' => '',
            'zipcode' => '9727 AJ'
        ]
    ];
    
    $result = $client->shipment->create($shipment);


`Back to top <#top>`_