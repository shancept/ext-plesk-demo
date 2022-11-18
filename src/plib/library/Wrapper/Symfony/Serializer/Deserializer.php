<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Wrapper\Symfony\Serializer;

use Symfony\Component\Serializer\Serializer as SymfonySerializer;

final class Deserializer implements DeserializerInterface
{
    private SymfonySerializer $serializer;

    public function __construct(SymfonySerializerFactory $symfonySerializer)
    {
        $this->serializer = $symfonySerializer->create();
    }

    /**
     * @template T of object
     * @psalm-param class-string<T> $type
     * @return T
     * @noinspection PhpDocSignatureIsNotCompleteInspection
     * @psalm-suppress MixedInferredReturnType
     */
    public function deserialize(string $data, string $type, string $format, array $context = []): object
    {
        /** @psalm-suppress MixedReturnStatement */
        return $this->serializer->deserialize($data, $type, $format, $context);
    }
}
