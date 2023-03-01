<?php
// Copyright 1999-2023. Plesk International GmbH. All rights reserved.

pm_Context::init('demo');

use PleskExt\Demo\Kernel;

$runtime = $_SERVER['APP_RUNTIME'] ?? $_ENV['APP_RUNTIME'] ?? 'Symfony\\Component\\Runtime\\SymfonyRuntime';
$runtime = new $runtime(($_SERVER['APP_RUNTIME_OPTIONS'] ?? $_ENV['APP_RUNTIME_OPTIONS'] ?? []) + [
        'project_dir' => dirname(__DIR__, 3).'/plib/modules/demo',
    ]);

$app = static function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};

[$app, $args] = $runtime
    ->getResolver($app)
    ->resolve();
$app = $app(...$args);

exit(
$runtime
    ->getRunner($app)
    ->run()
);