<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\UseCases\Command\UpdateCredentials;

use PleskExt\Demo\Repository\CredentialsRepository;
use PleskExt\Demo\Wrapper\Plesk\Crypt\CryptInterface;

final class Handler
{
    private CredentialsRepository $repository;
    private CryptInterface $cryptService;

    public function __construct(CredentialsRepository $repository, CryptInterface $cryptService)
    {
        $this->repository = $repository;
        $this->cryptService = $cryptService;
    }

    public function handle(Command $command): void
    {
        $credentials = $this->repository->getCredentials();
        $encryptedApiKey = $this->cryptService->encrypt($command->apiKey);
        $credentials->updateApiKey($encryptedApiKey, $command->keyTitle);
        $this->repository->updateCredentials($credentials);
    }
}
