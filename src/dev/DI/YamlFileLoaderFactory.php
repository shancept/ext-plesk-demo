<?php
// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\DI;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

final class YamlFileLoaderFactory implements LoaderFactoryInterface
{
    private string $plibDir;
    private string $servicesFilePath;

    public function __construct(string $plibDir, string $servicesFilePath)
    {
        $this->plibDir = $plibDir;
        $this->servicesFilePath = $servicesFilePath;
    }

    public function create(ContainerBuilder $containerBuilder): LoaderInterface
    {
        return new YamlFileLoader(
            $containerBuilder,
            new FileLocator([
                $this->plibDir,
                $this->servicesFilePath,
            ]),
        );
    }
}
