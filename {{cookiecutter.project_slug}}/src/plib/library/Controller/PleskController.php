<?php
// Copyright 1999-{{ year }}. Plesk International GmbH. All rights reserved.

declare(strict_types=1);

namespace {{cookiecutter.namespace}}\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PleskController
{

    public function __construct(private \pm_Application $pleskApplication)
    {
    }

    #[Route('/', name: 'index')]
    public function __invoke(): Response
    {
        /** @var \Zend_Controller_Router_Interface $router */
        $router = \Zend_Controller_Front::getInstance()->getRouter();
        $router->addConfig(new \Zend_Config([
            'Default' => [
                'route' => ':controller/:action',
            ],
            [
                'route' => '/',
                'defaults' => ['controller' => 'index', 'action' => 'view'],
            ],
        ]));
        $this->pleskApplication->run();
        return new Response();
    }
}
