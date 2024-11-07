<?php

declare(strict_types=1);

namespace App;

define('ROOT_APP', dirname(__FILE__));

class AppLoader
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
        if (str_starts_with($class, __NAMESPACE__)) {
            $class = substr($class, strlen(__NAMESPACE__) + 1);
            $class = str_replace('\\', '/', $class);

            require_once ROOT_APP . "/" . $class . ".php";
        }
    }
}
