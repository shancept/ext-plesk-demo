<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\UseCases\Query\GetCredentials;

use PleskExt\Demo\Repository\CredentialsRepository;
use PleskExt\Demo\Repository\Exception\CredentialsRepositoryException;

final class Handler
{
    private CredentialsRepository $credentialsRepository;

    public function __construct(CredentialsRepository $credentialsRepository)
    {
        $this->credentialsRepository = $credentialsRepository;
    }

    public function handle(): ResponseModel
    {
        try {
            $credentials = $this->credentialsRepository->getCredentials();
            $title = $credentials->getKeyTitle();
            $apiKeyExist = true;
        } catch (CredentialsRepositoryException $exception) {
            $title = null;
            $apiKeyExist = false;
        }
        return new ResponseModel(
            $apiKeyExist,
            $title
        );
    }
}
