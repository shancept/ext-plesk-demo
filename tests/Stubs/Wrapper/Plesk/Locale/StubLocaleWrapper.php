<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Test\Stubs\Wrapper\Plesk\Locale;

use PleskExt\Demo\Wrapper\Plesk\Locale\LocaleInterface;

final class StubLocaleWrapper implements LocaleInterface
{
    public function lmsg(string $key, array $params = []): string
    {
        return $key . implode('', $params);
    }

    public function getSection(string $sectionKey): array
    {
        return [];
    }
}
