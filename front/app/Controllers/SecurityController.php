<?php

namespace App\Controllers;

use Core\Attributes\Controller;
use Core\Attributes\Route;

#[Controller]
class SecurityController
{
    #[Route(url: "/login", name: "login")]
    public function showLogin(): void
    {
        echo "<p> Login page </p>";
    }

    #[Route(url: "/test-route", name: "test_route")]
    public function testRoute(): void
    {
        echo "<p>test route</p>";
    }
}
