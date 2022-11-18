<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Controller;

use PleskExt\Demo\Http\ResponseHelper;
use Psr\Http\Message\ResponseInterface;

final class DateController
{
    public function __invoke(): ResponseInterface
    {
        return ResponseHelper::json(date('Y-m-d H:i:s'));
    }
}
