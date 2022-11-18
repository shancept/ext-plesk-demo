<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Http;

use Psr\Http\Message\ResponseInterface;

final class Headers
{
    public static function sender(ResponseInterface $response): void
    {
        header("HTTP/1.1 {$response->getStatusCode()} {$response->getReasonPhrase()}");
        foreach ($response->getHeaders() as $name => $values) {
            header($name . ':' . implode(', ', $values));
        }
    }
}
