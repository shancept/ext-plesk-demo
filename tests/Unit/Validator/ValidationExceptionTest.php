<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Test\Unit\Validator;

use PleskExt\Demo\Test\TestCase;
use PleskExt\Demo\Wrapper\Symfony\Validator\ValidationException;
use Symfony\Component\Validator\ConstraintViolationList;

/**
 * @covers \PleskExt\Demo\Wrapper\Symfony\Validator\ValidationException
 *
 * @internal
 */
final class ValidationExceptionTest extends TestCase
{
    public function testValid(): void
    {
        $exception = new ValidationException(
            $violations = new ConstraintViolationList()
        );

        self::assertEquals('Invalid input', $exception->getMessage());
        self::assertEquals($violations, $exception->getViolations());
    }
}
