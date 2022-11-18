<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo;

use PleskExt\Demo\UseCases\Command\AddCredentials\Command as AddCredentialsCommand;
use PleskExt\Demo\UseCases\Command\AddCredentials\Handler as AddCredentialsHandler;
use PleskExt\Demo\UseCases\Command\RemoveCredentials\Handler as RemoveCredentialsHandler;

final class Installer
{
    private AddCredentialsHandler $addCredentialsHandler;
    private RemoveCredentialsHandler $removeCredentialsHandler;

    public function __construct(
        AddCredentialsHandler $addCredentialsHandler,
        RemoveCredentialsHandler $removeCredentialsHandler
    ) {
        $this->addCredentialsHandler = $addCredentialsHandler;
        $this->removeCredentialsHandler = $removeCredentialsHandler;
    }

    public function install(): void
    {
        $this->addCredentialsHandler->handle(new AddCredentialsCommand('', 'EmptyKey'));
    }

    public function unInstall(): void
    {
        $this->removeCredentialsHandler->handle();
    }
}
