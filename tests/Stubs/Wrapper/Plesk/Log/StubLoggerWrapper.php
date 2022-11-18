<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Test\Stubs\Wrapper\Plesk\Log;

use Psr\Log\LoggerInterface;

final class StubLoggerWrapper implements LoggerInterface
{
    public function log($level, $message, array $context = []): void
    {
    }

    public function emergency($message, array $context = []): void
    {
    }

    public function alert($message, array $context = []): void
    {
    }

    public function critical($message, array $context = []): void
    {
    }

    public function error($message, array $context = []): void
    {
    }

    public function warning($message, array $context = []): void
    {
    }

    public function notice($message, array $context = []): void
    {
    }

    public function info($message, array $context = []): void
    {
    }

    public function debug($message, array $context = []): void
    {
    }
}
