<?php

declare(strict_types=1);

namespace App\Models;

use App\DataTransferObjects\AccountLoginDto;
use PDO;

class AccountModel extends AbstractModel
{
    const TABLE_ACCOUNT_NAME = "mh_account";

    public function isAccountExists(string $username): bool
    {
        $pdoStatement = $this->pdo->prepare(
            "SELECT username FROM " . self::TABLE_ACCOUNT_NAME .
                " WHERE username = :username"
        );

        $pdoStatement->execute([
            'username' => $username
        ]);

        return  false !== $pdoStatement->fetchColumn();
    }


    public function findAccountByUsername(string $username): AccountLoginDto
    {
        $pdoStatement = $this->pdo->prepare(
            "SELECT username, id, password FROM " . self::TABLE_ACCOUNT_NAME .
                " WHERE username = :username"
        );

        $pdoStatement->setFetchMode(PDO::FETCH_OBJ);

        $pdoStatement->execute([
            'username' => $username
        ]);

        $result = $pdoStatement->fetch();

        return new AccountLoginDto(id: $result->id, username: $result->username, password: $result->password);
    }
}
