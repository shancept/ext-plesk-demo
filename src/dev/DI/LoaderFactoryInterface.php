<?php
// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\DI;

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

interface LoaderFactoryInterface
{
    public function create(ContainerBuilder $containerBuilder): LoaderInterface;
}