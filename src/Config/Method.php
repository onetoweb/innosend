<?php

namespace Onetoweb\Innosend\Config;

enum Method: string {
    case GET = 'GET';
    case POST = 'POST';
    case PATCH = 'PATCH';
    case DELETE = 'DELETE';
}
