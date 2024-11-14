<?php

declare(strict_types=1);

namespace App;

use App\MysqlConnector;
use Exception;
use PDO;

class AddBill
{
    public function add(string $code): array
    {
        $mysqlConnector = new MysqlConnector();
        $pdo = $mysqlConnector->connect();

        $statement = $pdo->prepare("INSERT INTO bill (code) VALUES(:code)");
        try {
            $statement->execute([':code' => $code]);

            $statement = $pdo->prepare("SELECT id FROM bill WHERE code = :code");
            $statement->setFetchMode(PDO::FETCH_OBJ);
            $statement->execute([':code' => $code]);
            $result = $statement->fetch();

            return [
                "id" => $result->id,
                "code" => $code
            ];
        } catch (Exception $e) {
            throw new Exception("Error creating bill " . $code . " " . $e->getMessage());
        }
    }
}
