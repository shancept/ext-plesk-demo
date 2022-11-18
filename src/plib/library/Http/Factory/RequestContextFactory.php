<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Http\Factory;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RequestContext;

final class RequestContextFactory
{
    public function create(): RequestContext
    {
        $requestContext = new RequestContext();
        $requestContext->fromRequest(Request::createFromGlobals());
        return $requestContext;
    }
}
