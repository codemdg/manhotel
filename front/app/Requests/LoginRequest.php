<?php

declare(strict_types=1);

namespace App\Requests;

class LoginRequest
{
    public function __construct(private string $username, private string $password) {}

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
