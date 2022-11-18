<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Wrapper\Symfony\Serializer;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Serializer as SymfonySerializer;

final class SymfonySerializerFactory
{
    private ObjectNormalizer $objectNormalizer;
    private JsonEncoder $jsonEncoder;

    public function __construct(ObjectNormalizer $objectNormalizer, JsonEncoder $jsonEncoder)
    {
        $this->objectNormalizer = $objectNormalizer;
        $this->jsonEncoder = $jsonEncoder;
    }

    public function create(): Serializer
    {
        return new SymfonySerializer([$this->objectNormalizer], [$this->jsonEncoder]);
    }
}
