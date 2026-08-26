.. _top:
.. title:: Tracking

`Back to index <index.rst>`_

========
Tracking
========

.. contents::
    :local:


Get tracking history
````````````````````
Look up tracking history for a shipment by tracking code.

.. code-block:: php
    
    $trackingCode = '';
    $result = $client->tracking->history($trackingCode);


Get delivery estimate
`````````````````````
Courier-reported delivery window for a package, or {start: null, end: null}.

.. code-block:: php
    
    $trackingCode = '';
    $result = $client->tracking->deliveryEstimate($trackingCode);


`Back to top <#top>`_