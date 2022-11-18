<?php
// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\DI;

use Exception;
use Symfony\Component\DependencyInjection\ContainerBuilder as SymfonyContainerBuilder;
use Symfony\Component\DependencyInjection\Dumper\PhpDumper;

final class ContainerBuilder
{
    private SymfonyContainerBuilder $containerBuilder;
    private LoaderFactoryInterface $loaderFactory;

    public function __construct(LoaderFactoryInterface $loaderFactory)
    {
        $this->containerBuilder = new SymfonyContainerBuilder();
        $this->loaderFactory = $loaderFactory;
    }

    /**
     * @throws Exception
     */
    public function generateContainer(ServiceContainerDto $serviceContainerDto): string
    {
        $loader = $this->loaderFactory->create($this->containerBuilder);
        $loader->load($serviceContainerDto->getServicesFileName());

        $this->containerBuilder->compile();

        /** @var string $container */
        $container = (new PhpDumper($this->containerBuilder))->dump([
            'namespace' => trim($serviceContainerDto->getNamespace(), '\\'),
            'class' => $serviceContainerDto->getClassName(),
        ]);
        return $container;
    }
}
