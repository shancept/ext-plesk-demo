<?php

declare(strict_types=1);

namespace {{cookiecutter.namespace}}\Controller;

use Symfony\Component\Routing\Annotation\Route;

class PleskIndexController
{

    public function __construct(private \pm_Application $pleskApplication)
    {
    }

    #[Route('/', name: 'index')]
    public function __invoke(): void
    {
        $this->pleskApplication->run();
    }
}
