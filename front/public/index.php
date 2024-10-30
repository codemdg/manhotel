<?php

use App\Controllers\SecurityController;
use Core\Kernel;

define('ROOT', dirname(__DIR__));

require_once ROOT . "/config/bootstrap.php";

$kernel = new Kernel($_SERVER['REQUEST_URI']);

$kernel->handleRequest();
