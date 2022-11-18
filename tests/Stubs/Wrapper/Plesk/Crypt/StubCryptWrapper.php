<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Test\Stubs\Wrapper\Plesk\Crypt;

use PleskExt\Demo\Wrapper\Plesk\Crypt\CryptInterface;

final class StubCryptWrapper implements CryptInterface
{
    public function encrypt(string $plainData): string
    {
        return strrev($plainData);
    }

    public function decrypt(string $encryptedData): string
    {
        return strrev($encryptedData);
    }
}
