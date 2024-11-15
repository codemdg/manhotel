<?php

use App\AddProductBill;
use App\AppLoader;

require "../app/AppLoader.php";
AppLoader::register();

$addProductBill = new AddProductBill();
if ($addProductBill->execute($_POST)) {
    echo "Product added to bill";
};
