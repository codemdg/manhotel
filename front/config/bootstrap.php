<?php

use App\AppLoader;
use Core\CoreLoader;

require_once ROOT . "/core/CoreLoader.php";
CoreLoader::register();

require_once ROOT . "/app/AppLoader.php";
AppLoader::register();
