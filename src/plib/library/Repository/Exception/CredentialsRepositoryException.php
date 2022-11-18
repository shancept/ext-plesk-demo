<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Repository\Exception;

use DomainException;

final class CredentialsRepositoryException extends DomainException
{
    public static function triedGetCredentials(): self
    {
        return new self('not found');
    }

    public static function triedSetCredentials(string $message): self
    {
        return new self("setting is failed $message");
    }
}
