<?php

declare(strict_types=1);

namespace App\Models;

use App\DataTransferObjects\AccountDto;
use App\DataTransferObjects\AccountLoginDto;
use DateTime;
use Exception;
use PDO;
use PDOException;

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

    public function findAccountById(int $id): AccountDto
    {
        $pdoStatement = $this->pdo->prepare(
            "SELECT username, email, id, created_at FROM " . self::TABLE_ACCOUNT_NAME .
                " WHERE id = :id"
        );
        $pdoStatement->setFetchMode(PDO::FETCH_CLASS, AccountDto::class);
        $pdoStatement->execute([
            'id' => $id
        ]);

        return $pdoStatement->fetch();
    }

    public function findAll(): array|bool
    {
        $pdoStatement = $this->pdo->prepare(
            "SELECT id, username, email, created_at FROM " . self::TABLE_ACCOUNT_NAME .
                " ORDER BY username ASC"
        );
        $pdoStatement->execute();
        $pdoStatement->setFetchMode(PDO::FETCH_CLASS, AccountDto::class);
        $result = $pdoStatement->fetchAll();

        return $result;
    }

    public function addNewAccount(array $account): void
    {
        $today = new DateTime();
        $pdoStatement = $this->pdo->prepare(
            "INSERT INTO " . self::TABLE_ACCOUNT_NAME .
                "(id, username, password, email, created_at)
            VALUES(null, :username, :password, :email, :created_at);"
        );
        try {
            $pdoStatement->execute([
                "username" => $account['txt_username'],
                "password" => sha1($account['txt_password']),
                "email" => $account['txt_email'],
                "created_at" => $today->format('Y-m-d h:i:s'),
            ]);
        } catch (PDOException $e) {
            throw new Exception("Error when adding new account " . $e->getMessage());
        }
    }

    public function saveAccount(array $account, int $id): void
    {
        $pdoStatement = $this->pdo->prepare(
            " UPDATE " . self::TABLE_ACCOUNT_NAME .
                "  SET username = :username, email= :email WHERE id=:id "
        );
        try {
            $pdoStatement->execute([
                "username" => $account['txt_username'],
                "email" => $account['txt_email'],
                "id" => $id
            ]);
        } catch (PDOException $e) {
            throw new Exception("Error when updating account " . $e->getMessage());
        }
    }

    public function deleteAccount(int $accountId): void
    {
        $pdoStatement = $this->pdo->prepare(
            "DELETE FROM " . self::TABLE_ACCOUNT_NAME .
                " WHERE id = :accountId"
        );
        try {
            $pdoStatement->execute([
                "accountId" => $accountId
            ]);
        } catch (PDOException $e) {
            throw new Exception("Error when deleting account " . $e->getMessage());
        }
    }
}
