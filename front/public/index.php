<?php


namespace front\public;

use front\app\First;
use front\app\Quarter;

class AutoLoader
{
    static function register()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    static function autoload($class)
    {
        $class = lcfirst(str_replace("\\", "/", $class));
        require_once dirname(__DIR__) . "/$class.php";
    }
}


AutoLoader::register();

//require_once "../app/First.php";
$first = new First();
$first->test();

$quarter = new Quarter();
$quarter->test();

// $second = new Second();
// $second->test();

// $third = new Third();
// $third->test();

// $firstCore = new FirstCore();
// $firstCore->testCore();
?>