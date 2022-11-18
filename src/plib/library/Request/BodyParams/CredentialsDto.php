<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Request\BodyParams;

final class CredentialsDto
{
    /**
     * @PleskExt\Demo\Wrapper\Symfony\Validator\Constraints\NotBlank(localeMessage="app.validator.trueCloudflareApiToken")
     * @PleskExt\Demo\Wrapper\Symfony\Validator\Constraints\TrueApiToken
     */
    public string $apiKey;

    /**
     * @PleskExt\Demo\Wrapper\Symfony\Validator\Constraints\NotBlank(localeMessage="app.validator.trueCloudflareApiToken")
     */
    public string $keyTitle;

    public function __construct(string $apiKey, string $keyTitle)
    {
        $this->apiKey = $apiKey;
        $this->keyTitle = $keyTitle;
    }
}
