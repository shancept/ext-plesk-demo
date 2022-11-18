<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Wrapper\Symfony\Validator\Constraints;

use PleskExt\Demo\DI\Container;
use Symfony\Component\Validator\Constraints\NotBlankValidator;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class NotBlank extends \Symfony\Component\Validator\Constraints\NotBlank
{
    public ?string $localeMessage = null;

    /**
     * @param string[]|null $groups
     * @param mixed $payload
     */
    public function __construct(
        array $options = null,
        string $message = null,
        string $localeMessage = null,
        bool $allowNull = null,
        callable $normalizer = null,
        array $groups = null,
        $payload = null
    ) {
        if (!is_null($localeMessage)) {
            $this->message = Container::getLocale()->lmsg($localeMessage);
        }
        parent::__construct($options, $message, $allowNull, $normalizer, $groups, $payload);
        $this->localeMessage = $localeMessage;
    }

    public function validatedBy(): string
    {
        return NotBlankValidator::class;
    }
}
