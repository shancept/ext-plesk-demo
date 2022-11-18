<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Test\DI;

use Exception;
use PleskExt\Demo\Wrapper\Plesk\Locale\LocaleInterface;
use Psr\Container\ContainerInterface;

final class Container implements ContainerInterface
{
    /**
     * @return mixed
     * @throws Exception
     */
    public function get(string $id)
    {
        return self::container()->get($id);
    }

    public function set(string $id, object $object): void
    {
        self::container()->set($id, $object);
    }

    public function unsetServices(): void
    {
        self::container()->unsetServices();
    }

    public function has(string $id): bool
    {
        return self::container()->has($id);
    }

    public static function getLocale(): LocaleInterface
    {
        return self::container()->get(LocaleInterface::class);
    }

    private static function container(): ProjectServiceContainerTest
    {
        /** @var ProjectServiceContainerTest $container */
        static $container = null;
        if ($container) {
            return $container;
        }
        return $container = new ProjectServiceContainerTest();
    }
}
