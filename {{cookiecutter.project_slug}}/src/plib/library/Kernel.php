<?php
// Copyright 1999-{{ cookiecutter.year }}. Plesk International GmbH. All rights reserved.

declare(strict_types=1);

namespace {{cookiecutter.namespace}};

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    public function getProjectDir(): string
    {
        return \dirname(__DIR__);
    }
}
