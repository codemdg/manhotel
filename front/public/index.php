<?php

use Core\Kernel;

session_start();

define('ROOT', dirname(__DIR__));

require_once ROOT . "/config/bootstrap.php";

$kernel = new Kernel($_SERVER['REQUEST_URI']);

if (!$kernel->handleRequest()) {
	header("Location: " . BASE_URL . "/page/not-found");
}
