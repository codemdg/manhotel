<?php
namespace App;

class AppLoader{
    static function register(){
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    static function autoload($class){
        $class = str_replace(__NAMESPACE__."\\","", $class);
        require_once __DIR__."/$class.php";
    }
}