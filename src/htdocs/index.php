<?php
// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

pm_Context::init('demo');

// config application
$config = new \PleskExt\Demo\Config();

// run application
(new \PleskExt\Demo\Application($config))->run();
