.. title:: Index

Index
=====

.. contents::
    :local:

===========
Basic Usage
===========

Setup

.. code-block:: php
    
    require 'vendor/autoload.php';
    
    use Onetoweb\Innosend\Client;
    
    // param
    $apiKey = '{api_key}';
    $apiSecret = '{api_secret}';
    
    // setup client
    $client = new Client($apiKey, $apiSecret);


========
Examples
========

* `Configuration <configuration.rst>`_
* `Shipment <shipment.rst>`_
