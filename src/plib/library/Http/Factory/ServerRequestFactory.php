<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Http\Factory;

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7\ServerRequest;
use Psr\Http\Message\ServerRequestInterface;

final class ServerRequestFactory
{
    /** @psalm-suppress PossiblyUndefinedArrayOffset */
    public static function create(): ServerRequestInterface
    {
//        (new Psr17Factory)->createServerRequest(
//            strtoupper($_SERVER['REQUEST_METHOD']),
//            $_SERVER['REQUEST_URI'],
//            $_SERVER
//        );
        $queries = [];
        \parse_str($_SERVER['QUERY_STRING'], $queries);
        return (new ServerRequest(
            strtoupper($_SERVER['REQUEST_METHOD']),
            $_SERVER['REQUEST_URI'],
            \getallheaders(),
            \fopen('php://input', 'rb'),
            '1.1',
            $_SERVER
        ))->withQueryParams($queries);
    }
}
