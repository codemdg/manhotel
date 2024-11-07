<?php

declare(strict_types=1);

namespace App;

use App\MysqlConnector;
use PDO;

class SearchProduct
{
    public function searchProduct(string $productName): array|bool
    {
        $mysqlConnector = new MysqlConnector();
        $pdo = $mysqlConnector->connect();

        $statement = $pdo->prepare("SELECT * FROM mkt_product WHERE name LIKE :product_name");
        $statement->execute([':product_name' => "%" . $productName . "%"]);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
