<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Http;

use Nyholm\Psr7\Factory\Psr17Factory;
use PleskExt\Demo\DI\Container;
use PleskExt\Demo\Http\Factory\ServerRequestFactory;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Symfony\Bridge\PsrHttpMessage\Factory\PsrHttpFactory;
use Symfony\Component\HttpFoundation\JsonResponse;

final class ResponseHelper
{
    /**
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public static function send(): void
    {
        $container = new Container();
        /** @var RequestHandlerInterface $requestHandler */
        $requestHandler = $container->get(RequestHandlerInterface::class);
        $serverRequest = ServerRequestFactory::create();
        $response = $requestHandler->handle($serverRequest);
        Headers::sender($response);
        echo $response->getBody();
        exit;
    }

    /**
     * @param mixed $data
     */
    public static function json($data = null, int $status = 200, array $headers = [], bool $json = false): ResponseInterface
    {
        $response = new JsonResponse($data, $status, $headers, $json);
        $psr17Factory = new Psr17Factory();
        $psrHttpFactory = new PsrHttpFactory($psr17Factory, $psr17Factory, $psr17Factory, $psr17Factory);
        return $psrHttpFactory->createResponse($response);
    }
}
