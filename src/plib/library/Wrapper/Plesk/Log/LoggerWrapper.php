<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Wrapper\Plesk\Log;

use pm_Bootstrap;
use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;

final class LoggerWrapper implements LoggerInterface
{
    use LoggerTrait;

    private LoggerInterface $pleskLogger;

    public function __construct()
    {
        /** @var LoggerInterface $pleskLogger */
        $pleskLogger = pm_Bootstrap::getContainer()->get(LoggerInterface::class);
        $this->pleskLogger = $pleskLogger;
    }

    public function log($level, $message, array $context = []): void
    {
        $this->pleskLogger->log($level, $message, $context);
    }
}
