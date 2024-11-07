<?php

declare(strict_types=1);

namespace App\Models;

use Core\Connectors\MysqlConnector;
use PDO;

abstract class AbstractModel
{
    protected PDO $pdo;

    public function __construct()
    {
        $connector = new MysqlConnector(user: "manhotel", password: "0000", dbname: "manhotel", host: "mh_mysql");
        $this->pdo = $connector->getPDO();
    }
}
