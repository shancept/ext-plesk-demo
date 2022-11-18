<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\UseCases\Query\GetBasicFrontendState;

final class ResponseModel
{
    private string $moduleId;
    private string $baseUrl;
    private string $pathToFrontendEntrypoint;
    private array $locale;

    public function __construct(string $moduleId, string $baseUrl, string $pathToFrontendEntrypoint, array $locale)
    {
        $this->moduleId = $moduleId;
        $this->baseUrl = $baseUrl;
        $this->pathToFrontendEntrypoint = $pathToFrontendEntrypoint;
        $this->locale = $locale;
    }

    public function getModuleId(): string
    {
        return $this->moduleId;
    }

    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    public function getPathToFrontendEntrypoint(): string
    {
        return $this->pathToFrontendEntrypoint;
    }

    public function getLocale(): array
    {
        return $this->locale;
    }
}
