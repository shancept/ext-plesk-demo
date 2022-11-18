<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Wrapper\Plesk\Context;

use pm_Context;

final class ContextWrapper implements ContextInterface
{
    public function getBaseUrl(): string
    {
        return pm_Context::getBaseUrl();
    }

    public function getModuleId(): string
    {
        return pm_Context::getModuleId();
    }
}
