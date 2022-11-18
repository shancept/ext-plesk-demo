<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Http\Middleware;

use Exception;
use PleskExt\Demo\Http\Handler\ExceptionHandler;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Log\LoggerInterface;

final class ErrorCatcher implements MiddlewareInterface
{
    private LoggerInterface $logger;
    private ExceptionHandler $exceptionHandler;

    public function __construct(LoggerInterface $logger, ExceptionHandler $exceptionHandler)
    {
        $this->logger = $logger;
        $this->exceptionHandler = $exceptionHandler;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        try {
            return $handler->handle($request);
        } catch (Exception $exception) {
            $this->logger->debug($exception);
            return $this->exceptionHandler->handle($exception);
        }
    }
}
