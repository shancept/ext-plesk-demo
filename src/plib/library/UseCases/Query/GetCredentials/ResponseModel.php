<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\UseCases\Query\GetCredentials;

final class ResponseModel
{
    public bool $apiKeyExist;
    public ?string $keyTitle;

    public function __construct(bool $apiKeyExist, ?string $keyTitle = null)
    {
        $this->apiKeyExist = $apiKeyExist;
        $this->keyTitle = $keyTitle;
    }
}
