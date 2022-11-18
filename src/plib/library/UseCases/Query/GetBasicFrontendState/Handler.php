<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\UseCases\Query\GetBasicFrontendState;

use PleskExt\Demo\Wrapper\Plesk\Context\ContextInterface;
use PleskExt\Demo\Wrapper\Plesk\Locale\LocaleInterface;

final class Handler
{
    private ContextInterface $context;
    private LocaleInterface $locale;

    public function __construct(ContextInterface $context, LocaleInterface $locale)
    {
        $this->context = $context;
        $this->locale = $locale;
    }

    public function handle(Query $query): ResponseModel
    {
        return new ResponseModel(
            $this->context->getModuleId(),
            $this->context->getBaseUrl() . $query->baseFileName,
            $this->context->getBaseUrl() . $query->frontendEntrypoint,
            $this->locale->getSection($query->localeSectionKey)
        );
    }
}
