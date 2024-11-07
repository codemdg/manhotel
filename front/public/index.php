<?php

use Core\Kernel;

session_start();

define('ROOT', dirname(__DIR__));

require_once ROOT . "/config/bootstrap.php";

$uri = parse_url($_SERVER['REQUEST_URI']);

$kernel = new Kernel($uri['path'] ?? "/page/not-found");

if (!$kernel->handleRequest()) {
	header("Location: " . BASE_URL . "/page/not-found");
}
