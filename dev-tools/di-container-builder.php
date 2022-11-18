<?php
// Copyright 1999-2022. Plesk International GmbH. All rights reserved.


$dirSep = DIRECTORY_SEPARATOR;
$plibDir = dirname(__DIR__) . "{$dirSep}src{$dirSep}plib";
require_once "$plibDir{$dirSep}vendor{$dirSep}autoload.php";

(bool)$isTest = $argv[1] ?? false;

$serviceContainerClass = new \PleskExt\Demo\DI\ServiceContainerDto(
    'PleskExt\\Demo\\',
    $isTest ? 'ProjectServiceContainerTest' : 'ProjectServiceContainer',
    $isTest ? 'services.test.yaml' : 'services.prod.yaml'
);

$pathToCache = ".{$dirSep}src{$dirSep}plib{$dirSep}cache";
$fileToGenerate = "$pathToCache/{$serviceContainerClass->getClassName()}.php";

$yamlFileLoader = new \PleskExt\Demo\DI\YamlFileLoaderFactory($plibDir, $plibDir . '/../dev/config');
$builder = new \PleskExt\Demo\DI\ContainerBuilder($yamlFileLoader);
if (
    !file_exists($pathToCache) &&
    !mkdir($pathToCache, 0755, true) &&
    !is_dir($pathToCache)
) {
    throw new \RuntimeException(sprintf('Directory "%s" was not created', $pathToCache));
}
\file_put_contents($fileToGenerate, $builder->generateContainer($serviceContainerClass));
