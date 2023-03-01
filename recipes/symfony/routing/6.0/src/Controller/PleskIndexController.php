<?php
// Copyright 1999-2023. Plesk International GmbH. All rights reserved.

declare(strict_types=1);

namespace PleskExt\Demo\Controller;

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