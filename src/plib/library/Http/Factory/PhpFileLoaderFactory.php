<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Http\Factory;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\PhpFileLoader;

final class PhpFileLoaderFactory
{
    public function create(string $file): PhpFileLoader
    {
        return new PhpFileLoader(new FileLocator([dirname($file)]));
    }
}
