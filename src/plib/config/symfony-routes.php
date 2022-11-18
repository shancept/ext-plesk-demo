<?php
// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

use PleskExt\Demo\Controller\DateController;
use PleskExt\Demo\Controller\UpdateCredentialsController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return static function (RoutingConfigurator $routes) {
    $routes->add('api_get_date', '/api/date')
        ->controller(DateController::class)
        ->methods(['GET']);
    $routes->add('update_credentials', '/api/credentials')
        ->controller(UpdateCredentialsController::class)
        ->methods(['PUT']);
};