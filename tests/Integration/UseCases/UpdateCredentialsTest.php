<?php
// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Test\Integration\UseCases;

use PleskExt\Demo\Repository\CredentialsRepository;
use PleskExt\Demo\Repository\Exception\CredentialsRepositoryException;
use PleskExt\Demo\Test\Stubs\Wrapper\Plesk\Settings\StubSettingsWrapper;
use PleskExt\Demo\Test\TestCase;
use PleskExt\Demo\UseCases\Command\UpdateCredentials\Command;
use PleskExt\Demo\UseCases\Command\UpdateCredentials\Handler;
use PleskExt\Demo\Wrapper\Plesk\Crypt\CryptInterface;
use PleskExt\Demo\Wrapper\Plesk\Settings\SettingsInterface;

/**
 * @covers \PleskExt\Demo\UseCases\Command\UpdateCredentials\Handler
 */
class UpdateCredentialsTest extends TestCase
{
    public function testSuccess(): void
    {
        /** @var StubSettingsWrapper $stubSettingsWrapper */
        $stubSettingsWrapper = $this->container->get(SettingsInterface::class);
        $stubSettingsWrapper->set(CredentialsRepository::API_KEY, '1234');
        $stubSettingsWrapper->set(CredentialsRepository::API_KEY_TITLE, 'foobar');

        /** @var Handler $handler */
        $handler = $this->container->get(Handler::class);
        $handler->handle(new Command(
            $apiKey = 'qwe123',
            $apiKeyTitle = 'foo123qwe'
        ));

        /** @var CredentialsRepository $repository */
        $repository = $this->container->get(CredentialsRepository::class);
        $model = $repository->getCredentials();

        /** @var CryptInterface $encryptService */
        $encryptService = $this->container->get(CryptInterface::class);

        $apiKeyEncrypted = $encryptService->encrypt($apiKey);

        self::assertEquals($apiKeyEncrypted, $model->getApiKeyEncrypted());
        self::assertEquals($apiKeyTitle, $model->getKeyTitle());
    }

    public function testNotFound(): void
    {
        /** @var Handler $handler */
        $handler = $this->container->get(Handler::class);
        $this->expectException(CredentialsRepositoryException::class);
        $handler->handle(new Command(
            '123',
            'foo'
        ));
    }
}
