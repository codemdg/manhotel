<?php

declare(strict_types=1);

namespace App;

use Exception;

class AddProductBill
{
    public function execute(array $data): bool
    {
        $mysqlConnector = new MysqlConnector();
        $pdo = $mysqlConnector->connect();

        $statement = $pdo->prepare("INSERT INTO bill_details (product_id,quantity,unit_price, bill_id) VALUES(:product_id,:quantity,:unit_price, :bill_id)");
        try {
            $statement->execute([
                ':product_id' => $data['idProduct'],
                ':quantity' => $data['qtProduct'],
                ':unit_price' => $data['unitPrice'],
                ':bill_id' => $data['idBill']
            ]);

            return true;
        } catch (Exception $e) {
            throw new Exception("Error creating bill detail for bill " . $data['idBill'] . " " . $e->getMessage());
        }

        return false;
    }
}
