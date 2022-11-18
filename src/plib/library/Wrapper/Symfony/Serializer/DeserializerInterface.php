<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Wrapper\Symfony\Serializer;

use Symfony\Component\Serializer\Encoder\JsonEncoder;

interface DeserializerInterface
{
    public const FORMAT_JSON = JsonEncoder::FORMAT;

    /**
     * @template T of object
     * @psalm-param class-string<T> $type
     * @return T
     * @noinspection PhpDocSignatureIsNotCompleteInspection
     */
    public function deserialize(string $data, string $type, string $format, array $context = []): object;
}
