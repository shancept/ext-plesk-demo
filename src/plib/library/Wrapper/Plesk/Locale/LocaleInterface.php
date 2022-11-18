<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Wrapper\Plesk\Locale;

interface LocaleInterface
{
    public function lmsg(string $key, array $params = []): string;

    public function getSection(string $sectionKey): array;
}
