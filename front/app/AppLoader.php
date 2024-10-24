<?php

namespace App;

class AutoLoader
{
    /**
     *
     * @return void
     */
    static function register(): void
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    /**
     * @param $class
     * @return void
     */
    static function autoload($class): void
    {
        $class = lcfirst(str_replace("\\", "/", $class));
        require_once dirname(__DIR__) . "/$class.php";
    }
}

