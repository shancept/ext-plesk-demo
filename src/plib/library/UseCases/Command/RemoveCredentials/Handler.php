<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\UseCases\Command\RemoveCredentials;

use PleskExt\Demo\Repository\CredentialsRepository;

final class Handler
{
    private CredentialsRepository $repository;

    public function __construct(CredentialsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(): void
    {
        $this->repository->removeCredentials();
    }
}
