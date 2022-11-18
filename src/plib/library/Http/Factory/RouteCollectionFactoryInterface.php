<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Http\Factory;

use Symfony\Component\Routing\RouteCollection;

interface RouteCollectionFactoryInterface
{
    public function create(string $routesFilePath): RouteCollection;
}
