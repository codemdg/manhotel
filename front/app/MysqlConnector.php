<?php

declare(strict_types=1);

namespace App;

use PDO;

class MysqlConnector
{
    public function connect(): PDO
    {
        $pdo = new PDO("mysql:host=mh_mysql;dbname=mk_market", "manhotel", "0000");
        $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
        return $pdo;
    }
}

