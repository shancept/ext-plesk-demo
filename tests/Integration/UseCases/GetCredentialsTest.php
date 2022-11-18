<?php
// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Test\Integration\UseCases;

use PleskExt\Demo\Repository\CredentialsRepository;
use PleskExt\Demo\Test\Stubs\Wrapper\Plesk\Settings\StubSettingsWrapper;
use PleskExt\Demo\Test\TestCase;
use PleskExt\Demo\UseCases\Query\GetCredentials\Handler;
use PleskExt\Demo\Wrapper\Plesk\Settings\SettingsInterface;

/**
 * @covers \PleskExt\Demo\UseCases\Query\GetCredentials\Handler
 */
class GetCredentialsTest extends TestCase
{
    protected function setUp(): void
    {
        /** @var StubSettingsWrapper $stubSettingsWrapper */
        $stubSettingsWrapper = $this->container->get(SettingsInterface::class);
        $stubSettingsWrapper->clean();
    }

    public function testSuccessCase(): void
    {
        /** @var StubSettingsWrapper $stubSettingsWrapper */
        $stubSettingsWrapper = $this->container->get(SettingsInterface::class);
        $stubSettingsWrapper->set(CredentialsRepository::API_KEY, '1234');
        $stubSettingsWrapper->set(CredentialsRepository::API_KEY_TITLE, $apikeyTitle = 'foobar');

        /** @var Handler $handler */
        $handler = $this->container->get(Handler::class);

        $model = $handler->handle();

        self::assertEquals($apikeyTitle, $model->keyTitle);
        self::assertTrue($model->apiKeyExist);
    }

    public function testEmptyModelCase(): void
    {
        /** @var Handler $handler */
        $handler = $this->container->get(Handler::class);

        $model = $handler->handle();

        self::assertNull($model->keyTitle);
        self::assertFalse($model->apiKeyExist);
    }
}