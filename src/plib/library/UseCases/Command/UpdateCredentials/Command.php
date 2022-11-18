<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\UseCases\Command\UpdateCredentials;

final class Command
{
    public string $apiKey;
    public string $keyTitle;

    public function __construct(string $apiKey, string $keyTitle)
    {
        $this->apiKey = $apiKey;
        $this->keyTitle = $keyTitle;
    }
}
