<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Http;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

use function spl_object_hash;

final class ChainedRequestHandler implements RequestHandlerInterface
{
    private array $middlewares = [];
    private RequestHandlerInterface $defaultHandler;

    public function __construct(RequestHandlerInterface $defaultHandler)
    {
        $this->defaultHandler = $defaultHandler;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $chain = $this->defaultHandler;
        /** @var MiddlewareInterface $middleware */
        foreach ($this->middlewares as $middleware) {
            $chain = new ChainedMiddleware($middleware, $chain);
        }

        return $chain->handle($request);
    }

    public function addMiddleware(MiddlewareInterface $middleware): void
    {
        if (isset($this->middlewares[spl_object_hash($middleware)])) {
            return;
        }

        $this->middlewares = [spl_object_hash($middleware) => $middleware] + $this->middlewares;
    }
}
