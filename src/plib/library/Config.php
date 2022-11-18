<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo;

final class Config
{
    private array $zendRouterConfig;
    private string $symfonyRoutingPath;

    private static ?self $instance;

    public function __construct()
    {
        $dirSep = DIRECTORY_SEPARATOR;
        /**
         * @var array zendRouterConfig
         * @psalm-suppress UnresolvableInclude
         */
        $this->zendRouterConfig = include __DIR__ . "{$dirSep}..{$dirSep}config{$dirSep}zend-routes.php";

        $symfonyRouterConfigFileName = 'symfony-routes.php';

        $this->symfonyRoutingPath = __DIR__ . "{$dirSep}..{$dirSep}config{$dirSep}{$symfonyRouterConfigFileName}";

        self::$instance = $this;
    }

    public static function getInstance(): self
    {
        return self::$instance ?? (self::$instance = new self());
    }

    public function getZendRouterConfig(): array
    {
        return $this->zendRouterConfig;
    }

    public function getSymfonyRoutesPath(): string
    {
        return $this->symfonyRoutingPath;
    }
}
