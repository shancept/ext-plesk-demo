<?php
// Copyright 1999-{{ cookiecutter.year }}. Plesk International GmbH. All rights reserved.

declare(strict_types=1);

if (file_exists(dirname(__DIR__).'/var/cache/prod/App_KernelProdContainer.preload.php')) {
    require dirname(__DIR__).'/var/cache/prod/App_KernelProdContainer.preload.php';
}
