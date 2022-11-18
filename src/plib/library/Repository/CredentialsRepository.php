<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Repository;

use Exception;
use PleskExt\Demo\Entity\Credentials\Credentials;
use PleskExt\Demo\Repository\Exception\CredentialsRepositoryException;
use PleskExt\Demo\Wrapper\Plesk\Settings\SettingsInterface;

final class CredentialsRepository
{
    public const API_KEY = 'apiKey';
    public const API_KEY_TITLE = 'apiKeyTitle';

    private SettingsInterface $settingsService;

    public function __construct(SettingsInterface $settingsService)
    {
        $this->settingsService = $settingsService;
    }

    public function getCredentials(): Credentials
    {
        $apiKey = $this->settingsService->get(self::API_KEY);
        $apiKeyTitle = $this->settingsService->get(self::API_KEY_TITLE);
        if ($apiKey === null || $apiKeyTitle === null) {
            throw CredentialsRepositoryException::triedGetCredentials();
        }
        return new Credentials($apiKey, $apiKeyTitle);
    }

    public function addCredentials(Credentials $credentials): void
    {
        try {
            $this->settingsService->set(self::API_KEY, $credentials->getApiKeyEncrypted());
            $this->settingsService->set(self::API_KEY_TITLE, $credentials->getKeyTitle());
        } catch (Exception $e) {
            throw CredentialsRepositoryException::triedSetCredentials($e->getMessage());
        }
    }

    public function updateCredentials(Credentials $credentials): void
    {
        try {
            $this->settingsService->set(self::API_KEY, $credentials->getApiKeyEncrypted());
            $this->settingsService->set(self::API_KEY_TITLE, $credentials->getKeyTitle());
        } catch (Exception $e) {
            throw CredentialsRepositoryException::triedSetCredentials($e->getMessage());
        }
    }

    public function removeCredentials(): void
    {
        $this->settingsService->clean(self::API_KEY);
        $this->settingsService->clean(self::API_KEY_TITLE);
    }
}
