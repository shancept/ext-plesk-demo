<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Controller;

use PleskExt\Demo\Http\ResponseHelper;
use PleskExt\Demo\Request\BodyParams\CredentialsDto;
use PleskExt\Demo\Request\DeserializedRequest;
use PleskExt\Demo\UseCases\Command\UpdateCredentials\Command;
use PleskExt\Demo\UseCases\Command\UpdateCredentials\Handler as UpdateCredentialsHandler;
use PleskExt\Demo\Wrapper\Symfony\Validator\Validator;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class UpdateCredentialsController
{
    private DeserializedRequest $deserializedRequest;
    private Validator $validator;
    private UpdateCredentialsHandler $editCredentialsHandler;

    public function __construct(
        DeserializedRequest $deserializedRequest,
        Validator $validator,
        UpdateCredentialsHandler $editCredentialsHandler
    ) {
        $this->deserializedRequest = $deserializedRequest;
        $this->validator = $validator;
        $this->editCredentialsHandler = $editCredentialsHandler;
    }

    public function __invoke(Request $request): ResponseInterface
    {
        $credentialsDto = $this->deserializedRequest->getBodyAndDeserialize($request, CredentialsDto::class);
        $this->validator->validate($credentialsDto);
        $this->editCredentialsHandler->handle(
            new Command($credentialsDto->apiKey, $credentialsDto->keyTitle)
        );
        return ResponseHelper::json(null, Response::HTTP_ACCEPTED);
    }
}
