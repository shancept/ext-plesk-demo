<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Test\DI;

/**
 * @internal
 * @coversNothing
 */
final class ProjectServiceContainerTest extends \PleskExt\Demo\ProjectServiceContainerTest
{
    public function unsetServices(): void
    {
        $this->services = [];
    }
}
