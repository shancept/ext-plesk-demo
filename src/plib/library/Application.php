<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo;

use pm_Application;
use Zend_Config;
use Zend_Controller_Front;
use Zend_Controller_Router_Exception;
use Zend_Controller_Router_Interface;

final class Application extends pm_Application
{
    /**
     * @throws Zend_Controller_Router_Exception
     */
    public function __construct(Config $config)
    {
        parent::__construct();
        /**
         * @var Zend_Controller_Front $frontController
         * @psalm-suppress UnnecessaryVarAnnotation
         */
        $frontController = Zend_Controller_Front::getInstance();
        /**
         * @var Zend_Controller_Router_Interface $router
         * @psalm-suppress UnnecessaryVarAnnotation
         */
        $router = $frontController->getRouter();
        /**
         * @psalm-suppress UndefinedInterfaceMethod
         */
        $router->addConfig(new Zend_Config($config->getZendRouterConfig()));
    }
}
