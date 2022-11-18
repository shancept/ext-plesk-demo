<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Wrapper\Plesk\Locale;

use pm_Locale;

final class LocaleWrapper implements LocaleInterface
{
    public function lmsg(string $key, array $params = []): string
    {
        return pm_Locale::lmsg($key, $params);
    }

    public function getSection(string $sectionKey): array
    {
        return pm_Locale::getSection($sectionKey);
    }
}
