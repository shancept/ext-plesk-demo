<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Wrapper\Plesk\Crypt;

use pm_Crypt;

final class CryptWrapper implements CryptInterface
{
    public function encrypt(string $plainData): string
    {
        return pm_Crypt::encrypt($plainData);
    }

    public function decrypt(string $encryptedData): string
    {
        return pm_Crypt::decrypt($encryptedData);
    }
}
