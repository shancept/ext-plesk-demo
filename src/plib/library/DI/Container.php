<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\DI;

use PleskExt\Demo\Wrapper\Plesk\Locale\LocaleInterface;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

final class Container implements ContainerInterface
{
    /**
     * @return mixed
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function get(string $id)
    {
        return self::container()->get($id);
    }

    public function has(string $id): bool
    {
        return self::container()->has($id);
    }

    public static function getLocale(): LocaleInterface
    {
        /** @var LocaleInterface $locale */
        return self::container()->get(LocaleInterface::class);
    }

    private static function container(): ContainerInterface
    {
        /** @var ContainerInterface|null $container */
        static $container = null;
        if ($container === null) {
            $container = new \PleskExt\Demo\ProjectServiceContainer();
        }
        return $container;
    }
}
