<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\DI;

use Closure;
use PleskExt\Demo\Config;
use Symfony\Component\DependencyInjection\EnvVarProcessorInterface;
use Symfony\Component\DependencyInjection\Exception\EnvNotFoundException;

final class ContextEnvVarProcessor implements EnvVarProcessorInterface
{
    private string $devDir;
    private Config $config;

    public function __construct(string $libraryDir = __DIR__ . '/..')
    {
        $this->devDir = $libraryDir;
        $this->config = Config::getInstance();
    }

    public function getEnv($prefix, $name, Closure $getEnv)
    {
        switch ($name) {
            case 'LIBRARY_DIR':
                return $this->devDir;
            case 'ROUTES_RESOURCE':
                return $this->config->getSymfonyRoutesPath();
        }

        throw new EnvNotFoundException('ext-context:' . $name);
    }

    public static function getProvidedTypes(): array
    {
        return ['ext_context' => 'string'];
    }
}
