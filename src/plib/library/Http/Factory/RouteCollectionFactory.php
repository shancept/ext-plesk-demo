<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Http\Factory;

use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;
use Symfony\Component\Routing\RouteCollection;

final class RouteCollectionFactory implements RouteCollectionFactoryInterface
{
    private PhpFileLoaderFactory $fileLoaderFactory;

    public function __construct(PhpFileLoaderFactory $fileLoaderFactory)
    {
        $this->fileLoaderFactory = $fileLoaderFactory;
    }

    public function create(string $routesFilePath): RouteCollection
    {
        $routeCollection = new RouteCollection();
        $routes = new RoutingConfigurator(
            $routeCollection,
            $this->fileLoaderFactory->create($routesFilePath),
            $routesFilePath,
            $routesFilePath
        );
        $routes->import($routesFilePath);
        return $routeCollection;
    }
}
