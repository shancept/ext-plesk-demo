<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Entity\Credentials;

use PleskExt\Demo\Entity\AggregateRoot;

final class Credentials implements AggregateRoot
{
    private string $apiKeyEncrypted;
    private string $keyTitle;

    public function __construct(string $apiKeyEncrypted, string $keyTitle)
    {
        $this->apiKeyEncrypted = $apiKeyEncrypted;
        $this->keyTitle = $keyTitle;
    }

    public function getApiKeyEncrypted(): string
    {
        return $this->apiKeyEncrypted;
    }

    public function getKeyTitle(): string
    {
        return $this->keyTitle;
    }

    public function updateApiKey(string $encryptedApiKey, string $keyTitle): void
    {
        $this->apiKeyEncrypted = $encryptedApiKey;
        $this->keyTitle = $keyTitle;
    }
}
