<?php

declare(strict_types=1);

namespace App\Controllers;

use Core\Attributes\Controller;
use Core\Attributes\Route;

#[Controller]
class SecurityController extends AbstractController
{
    #[Route(url: "/login", name: "login")]
    public function showLogin(): void
    {
        $this->responseInterface->render("Security/sign_in.php", [
            "bodyClasses" => "text-center",
            "mainClasses" => "form-signin w-100 m-auto"
        ]);
    }
}
