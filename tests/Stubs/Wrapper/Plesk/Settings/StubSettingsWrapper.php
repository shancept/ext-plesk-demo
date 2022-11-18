<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Test\Stubs\Wrapper\Plesk\Settings;

use PleskExt\Demo\Repository\CredentialsRepository;
use PleskExt\Demo\Wrapper\Plesk\Settings\SettingsInterface;

final class StubSettingsWrapper implements SettingsInterface
{
    /**
     * @var null[]|string[]
     */
    private array $storage = [];

    public function get(string $name): ?string
    {
        return $this->storage[$name] ?? null;
    }

    public function set(string $name, ?string $value): void
    {
        $this->storage[$name] = $value;
    }

    public function clean(string $prefix = ''): void
    {
        $this->storage = [];
    }
}
