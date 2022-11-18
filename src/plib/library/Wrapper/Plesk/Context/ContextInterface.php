<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Wrapper\Plesk\Context;

interface ContextInterface
{
    public function getBaseUrl(): string;

    public function getModuleId(): string;
}
