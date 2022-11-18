<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Test\Unit\Validator;

use Exception;
use PHPUnit\Framework\TestCase;
use PleskExt\Demo\Wrapper\Symfony\Validator\ValidationException;
use PleskExt\Demo\Wrapper\Symfony\Validator\Validator;
use stdClass;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @covers \PleskExt\Demo\Wrapper\Symfony\Validator\Validator
 *
 * @internal
 */
final class ValidatorTest extends TestCase
{
    public function testValid(): void
    {
        $command = new stdClass();

        $origin = $this->createMock(ValidatorInterface::class);
        $origin->expects(self::once())->method('validate')
            ->with(self::equalTo($command))
            ->willReturn(new ConstraintViolationList());

        $validator = new Validator($origin);

        $validator->validate($command);
    }

    public function testNotValid(): void
    {
        $command = new stdClass();

        $origin = $this->createMock(ValidatorInterface::class);
        $origin->expects(self::once())->method('validate')
            ->with(self::equalTo($command))
            ->willReturn($violations = new ConstraintViolationList([
                $this->createMock(ConstraintViolation::class),
            ]));

        $validator = new Validator($origin);

        try {
            $validator->validate($command);
            self::fail('Expected exception is not thrown');
        } catch (Exception $exception) {
            self::assertInstanceOf(ValidationException::class, $exception);
            self::assertEquals($violations, $exception->getViolations());
        }
    }
}
