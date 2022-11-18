<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Wrapper\Plesk\Crypt;

interface CryptInterface
{
    public function encrypt(string $plainData): string;

    public function decrypt(string $encryptedData): string;
}
