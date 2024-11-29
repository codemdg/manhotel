<?php

declare(strict_types=1);

namespace App\DataTransferObjects;


class AccountDto
{
    public int $id;
    public string $username;
    public string $email;
    public string $created_at;
}
