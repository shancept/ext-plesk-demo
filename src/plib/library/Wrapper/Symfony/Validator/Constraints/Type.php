<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Wrapper\Symfony\Validator\Constraints;

use PleskExt\Demo\DI\Container;
use Symfony\Component\Validator\Constraints\TypeValidator;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 */
final class Type extends \Symfony\Component\Validator\Constraints\Type
{
    public ?string $localeMessage = null;

    /**
     * @param array|string $type
     * @param mixed $payload
     */
    public function __construct(
        $type,
        string $message = null,
        string $localeMessage = null,
        array $groups = null,
        $payload = null,
        array $options = []
    ) {
        if (!is_null($localeMessage)) {
            $this->message = Container::getLocale()->lmsg($localeMessage);
        }
        parent::__construct($type, $message, $groups, $payload, $options);
        $this->localeMessage = $localeMessage;
    }

    public function validatedBy(): string
    {
        return TypeValidator::class;
    }
}
