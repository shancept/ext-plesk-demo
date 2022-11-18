<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Http\Factory;

use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

final class HttpFoundationRequestFactory
{
    public function create(ServerRequestInterface $request): HttpFoundationRequest
    {
        return new HttpFoundationRequest(
            $request->getQueryParams(),
            $_POST,
            $request->getAttributes(),
            $request->getCookieParams(),
            $request->getUploadedFiles(),
            $request->getServerParams(),
            $request->getBody()
        );
    }
}
