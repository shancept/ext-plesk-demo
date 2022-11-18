<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Wrapper\Symfony\Validator\Constraints;

use PleskExt\Demo\DI\Container;
use Symfony\Component\Validator\Constraint;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 * @Annotation
 */
final class TrueApiToken extends Constraint
{
    public string $message;

    /**
     * @param mixed $options
     * @param string[]|null $groups
     * @param mixed $payload
     */
    public function __construct($options = null, array $groups = null, $payload = null)
    {
        parent::__construct($options, $groups, $payload);
        $this->message = Container::getLocale()->lmsg('app.validator.trueApiToken');
    }
}
