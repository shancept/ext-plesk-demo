<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Wrapper\Symfony\Validator;

use PleskExt\Demo\DI\Container;
use PleskExt\Demo\Wrapper\Symfony\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\ConstraintValidatorFactoryInterface;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Symphony constraint classes need to be overridden to use locale from Plesk
 * Example @see NotBlank.
 */
final class ValidatorFactory
{
    public static function createValidator(): ValidatorInterface
    {
        $container = new Container();
        /** @var ConstraintValidatorFactoryInterface $constraintValidatorFactory */
        $constraintValidatorFactory = $container->get(ConstraintValidatorFactoryInterface::class);
        return Validation::createValidatorBuilder()
            ->enableAnnotationMapping()
            ->setConstraintValidatorFactory($constraintValidatorFactory)
            ->getValidator();
    }
}
