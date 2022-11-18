<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\UseCases\Query\GetBasicFrontendState;

final class Query
{
    public string $localeSectionKey;
    public string $frontendEntrypoint;
    public string $baseFileName;

    public function __construct(string $localeSectionKey, string $frontendEntrypoint, string $baseFileName = '')
    {
        $this->localeSectionKey = $localeSectionKey;
        $this->frontendEntrypoint = $frontendEntrypoint;
        $this->baseFileName = $baseFileName;
    }
}
