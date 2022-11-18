<?php
// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\DI;

final class ServiceContainerDto
{
    private string $namespace;
    private string $className;
    private string $servicesFileName;

    public function __construct(string $namespace, string $className, string $servicesFileName)
    {
        $this->namespace = $namespace;
        $this->className = $className;
        $this->servicesFileName = $servicesFileName;
    }

    public function getNamespace(): string
    {
        return $this->namespace;
    }

    public function getClassName(): string
    {
        return $this->className;
    }

    public function getServicesFileName(): string
    {
        return $this->servicesFileName;
    }
}