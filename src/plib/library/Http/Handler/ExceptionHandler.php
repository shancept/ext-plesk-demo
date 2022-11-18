<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Http\Handler;

use DomainException;
use Exception;
use InvalidArgumentException;
use PleskExt\Demo\Http\ResponseHelper;
use PleskExt\Demo\Wrapper\Symfony\Validator\ValidationException;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;

final class ExceptionHandler
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function handle(Exception $exception): ResponseInterface
    {
        switch (true) {
            case $exception instanceof MethodNotAllowedException:
                return $this->handleMethodNotAllowedException($exception);
            case $exception instanceof DomainException:
                return $this->handleDomainException($exception);
            case $exception instanceof InvalidArgumentException:
                return $this->handleInvalidArgumentException($exception);
            case $exception instanceof ValidationException:
                return $this->handleValidationException($exception);
        }
        return $this->handleDefaultException($exception);
    }

    private function handleDefaultException(Exception $exception): ResponseInterface
    {
        $this->logger->error($exception->getMessage(), ['exception' => $exception]);
        $data = ['message' => $exception->getMessage()];
        return ResponseHelper::json($data, Response::HTTP_BAD_REQUEST);
    }

    private function handleMethodNotAllowedException(MethodNotAllowedException $exception): ResponseInterface
    {
        $message = 'Method not allowed. Allowed methods: ' . implode(', ', $exception->getAllowedMethods());
        $this->logger->error($message, ['exception' => $exception]);
        return ResponseHelper::json(['message' => $message], Response::HTTP_CONFLICT);
    }

    private function handleDomainException(DomainException $exception): ResponseInterface
    {
        $this->logger->error($exception->getMessage(), ['exception' => $exception]);
        $data = ['message' => $exception->getMessage()];
        return ResponseHelper::json($data, Response::HTTP_CONFLICT);
    }

    private function handleInvalidArgumentException(InvalidArgumentException $exception): ResponseInterface
    {
        $this->logger->error($exception->getMessage(), ['exception' => $exception]);
        $data = ['message' => $exception->getMessage()];
        return ResponseHelper::json($data, Response::HTTP_CONFLICT);
    }

    private function handleValidationException(ValidationException $exception): ResponseInterface
    {
        $this->logger->info($exception->getMessage(), ['exception' => $exception]);
        $errors = [];
        foreach ($exception->getViolations() as $violation) {
            $errors[$violation->getPropertyPath()] = $violation->getMessage();
        }

        $data = ['message' => $exception->getMessage(), 'errors' => $errors];

        return ResponseHelper::json($data, Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
