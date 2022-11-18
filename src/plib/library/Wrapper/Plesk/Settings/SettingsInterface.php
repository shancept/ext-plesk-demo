<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Wrapper\Plesk\Settings;

interface SettingsInterface
{
    public function get(string $name): ?string;

    public function set(string $name, ?string $value): void;

    public function clean(string $prefix = ''): void;
}
