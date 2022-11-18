<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Request\Exception;

use InvalidArgumentException;

final class MissingConstructorArgumentsException extends InvalidArgumentException
{
    /**
     * @param string[] $missingArguments
     */
    public static function triedCreateDto(array $missingArguments): self
    {
        return new self(
            sprintf('Requires parameters "%s" to be present.', implode(', ', $missingArguments))
        );
    }
}
