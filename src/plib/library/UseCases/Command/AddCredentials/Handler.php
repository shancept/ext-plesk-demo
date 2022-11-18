<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\UseCases\Command\AddCredentials;

use PleskExt\Demo\Entity\Credentials\Credentials;
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
        $encryptedApiKey = $this->cryptService->encrypt($command->apiKey);
        $this->repository->addCredentials(new Credentials($encryptedApiKey, $command->keyTitle));
    }
}
