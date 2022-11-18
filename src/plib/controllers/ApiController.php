<?php
// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

use PleskExt\Demo\Http\ResponseHelper;

class ApiController extends pm_Controller_Action
{

    /**
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __call($methodName, $args)
    {
        ResponseHelper::send();
    }
}