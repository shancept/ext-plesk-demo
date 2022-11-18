<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Http\Handler;

use PleskExt\Demo\DI\Container;
use PleskExt\Demo\Http\ResponseHelper;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

final class NotFoundRequestHandler implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return ResponseHelper::json(Container::getLocale()->lmsg('app.response.notFound'), 404);
    }
}
