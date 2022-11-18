<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Test\Unit\Entity\Credentials;

use PleskExt\Demo\Test\Builder\Entity\Credentials\CredentialsBuilder;
use PleskExt\Demo\Test\TestCase;

/**
 * @covers \PleskExt\Demo\Entity\Credentials\Credentials
 *
 * @internal
 */
final class GettersTest extends TestCase
{
    public function testGetToken(): void
    {
        $credentials = CredentialsBuilder::simpleBuild();
        self::assertEquals(CredentialsBuilder::API_KEY_ENCRYPTED, $credentials->getApiKeyEncrypted());
        self::assertEquals(CredentialsBuilder::KEY_TITLE, $credentials->getKeyTitle());
    }
}
