<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Test;

use PleskExt\Demo\Test\DI\Container;

/**
 * @internal
 * @coversNothing
 */
class TestCase extends \PHPUnit\Framework\TestCase
{
    protected Container $container;

    /**
     * @param int|string $dataName
     */
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->container = new Container();
        parent::__construct($name, $data, $dataName);
    }
}
