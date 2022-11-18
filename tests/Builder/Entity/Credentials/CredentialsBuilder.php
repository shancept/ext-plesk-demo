<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Test\Builder\Entity\Credentials;

use PleskExt\Demo\Entity\Credentials\Credentials;

final class CredentialsBuilder
{
    public const API_KEY_ENCRYPTED = 'qwe123';
    public const KEY_TITLE = 'keyTitle';

    private string $apiKeyEncrypted;
    private string $keyTitle;

    public function __construct()
    {
        $this->apiKeyEncrypted = self::API_KEY_ENCRYPTED;
        $this->keyTitle = self::KEY_TITLE;
    }

    public function withApiKeyEncrypted(string $apiKeyEncrypted): self
    {
        $clone = clone $this;
        $clone->apiKeyEncrypted = $apiKeyEncrypted;
        return $clone;
    }

    public function withKeyTitleEncrypted(string $keyTitle): self
    {
        $clone = clone $this;
        $clone->keyTitle = $keyTitle;
        return $clone;
    }

    public function build(): Credentials
    {
        return new Credentials($this->apiKeyEncrypted, $this->keyTitle);
    }

    public static function simpleBuild(): Credentials
    {
        return (new self())->build();
    }
}
