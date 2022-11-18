<?php
// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

use PleskExt\Demo\DI\Container;
use PleskExt\Demo\Installer;

$plibDir = dirname(__DIR__);
require_once $plibDir . '/vendor/autoload.php';

$container = new Container();
/** @var Installer $installer */
$installer = $container->get(Installer::class);
$installer->install();