<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Request;

use PleskExt\Demo\Wrapper\Symfony\Serializer\DeserializerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Exception\MissingConstructorArgumentsException;

final class DeserializedRequest
{
    private DeserializerInterface $deserializer;

    public function __construct(DeserializerInterface $deserializer)
    {
        $this->deserializer = $deserializer;
    }

    /**
     * @template T of object
     * @psalm-param class-string<T> $type
     * @return T
     * @noinspection PhpDocSignatureIsNotCompleteInspection
     */
    public function getBodyAndDeserialize(Request $request, string $type): object
    {
        $content = (string)$request->getContent();
        try {
            return $this->deserializer->deserialize(
                $content === '' ? '{}' : $content,
                $type,
                DeserializerInterface::FORMAT_JSON
            );
        } catch (MissingConstructorArgumentsException $exception) {
            throw Exception\MissingConstructorArgumentsException::triedCreateDto(
                $exception->getMissingConstructorArguments()
            );
        }
    }
}
