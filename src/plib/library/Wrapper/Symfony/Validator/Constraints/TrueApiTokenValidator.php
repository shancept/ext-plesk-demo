<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Wrapper\Symfony\Validator\Constraints;

use Exception;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

final class TrueApiTokenValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint): void
    {
        if (!$constraint instanceof TrueApiToken) {
            throw new UnexpectedTypeException($constraint, TrueApiToken::class);
        }

        try {
//            $responseSomeService = $this->httpTokenVerifyApi->create()->getBody();
//            $tokenIsValid = $responseSomeService->success;
            $tokenIsValid = true;
        } catch (Exception $exception) {
            $tokenIsValid = false;
        }

        if ($tokenIsValid === false) {
            $this->context->buildViolation($constraint->message)->addViolation();
        }
    }
}
