<?php

declare(strict_types=1);

namespace App\DataTransferObjects;

class AccountLoginDto
{

    public function __construct(private ?string $username = null, private ?string $firstname = null, private ?string $lastname = null, private ?int $id = null, private ?string $password = null) {}

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function isAuthenticated(): bool
    {
        return null !== $this->username;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }
}
