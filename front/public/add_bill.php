<?php

use App\AddBill;
use App\AppLoader;

require "../app/AppLoader.php";
AppLoader::register();
header("Content-Type: application/json");
$addBill = new AddBill();

echo json_encode($addBill->add(rand(10000, 900000)));
