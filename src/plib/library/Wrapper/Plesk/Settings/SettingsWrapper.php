<?php

// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace PleskExt\Demo\Wrapper\Plesk\Settings;

use pm_Exception_InvalidArgumentException;
use pm_Settings;
use Zend_Db_Table_Exception;
use Zend_Db_Table_Row_Exception;

final class SettingsWrapper implements SettingsInterface
{
    public function get(string $name): ?string
    {
        return pm_Settings::get($name);
    }

    /**
     * @throws pm_Exception_InvalidArgumentException
     * @throws Zend_Db_Table_Row_Exception
     * @throws Zend_Db_Table_Exception
     */
    public function set(string $name, ?string $value): void
    {
        pm_Settings::set($name, $value);
    }

    public function clean(string $prefix = ''): void
    {
        pm_Settings::clean($prefix);
    }
}
