<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Http\Middleware;

use PleskExt\Demo\Http\Factory\HttpFoundationRequestFactory;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Symfony\Component\HttpKernel\Controller\ArgumentResolverInterface;
use Symfony\Component\HttpKernel\Controller\ControllerResolverInterface;
use Symfony\Component\Routing\Matcher\RequestMatcherInterface;

final class MatchedController implements MiddlewareInterface
{
    private ControllerResolverInterface $controllerResolver;
    private ArgumentResolverInterface $argumentResolver;
    private HttpFoundationRequestFactory $httpFoundationRequestFactory;
    private RequestMatcherInterface $requestMatcher;

    public function __construct(
        ControllerResolverInterface $controllerResolver,
        ArgumentResolverInterface $argumentResolver,
        HttpFoundationRequestFactory $httpFoundationRequestFactory,
        RequestMatcherInterface $requestMatcher
    ) {
        $this->controllerResolver = $controllerResolver;
        $this->argumentResolver = $argumentResolver;
        $this->httpFoundationRequestFactory = $httpFoundationRequestFactory;
        $this->requestMatcher = $requestMatcher;
    }

    /**
     * @psalm-suppress MixedInferredReturnType
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $httpFoundationRequest = $this->httpFoundationRequestFactory->create($request);
        $parameters = $this->requestMatcher->matchRequest($httpFoundationRequest);
        $httpFoundationRequest->attributes->add($parameters);
        $controller = $this->controllerResolver->getController($httpFoundationRequest);
        if ($controller === false) {
            return $handler->handle($request);
        }
        $arguments = $this->argumentResolver->getArguments($httpFoundationRequest, $controller);
        /**
         * @psalm-suppress MixedReturnStatement
         */
        return $controller(...$arguments);
    }
}
