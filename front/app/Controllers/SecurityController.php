<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\AccountModel;
use App\Models\AuthenticateModel;
use App\Requests\LoginRequest;
use Core\Attributes\Controller;
use Core\Attributes\Route;
use Core\Utils\Session;

#[Controller]
class SecurityController extends AbstractController
{

    #[Route(url: "/login", name: "login")]
    public function showLogin(): void
    {
        if (!empty($_POST)) {
            $authenticateModel = new AuthenticateModel(new AccountModel());
            $accountLoginDto = $authenticateModel
                ->authenticate(new LoginRequest($_POST["username"], $_POST["password"]));
            if ($accountLoginDto->isAuthenticated()) {
                Session::setSession(key: "auth", value: true);
                Session::setSession(key: "id", value: $accountLoginDto->getId());
                Session::setSession(key: "username", value: $accountLoginDto->getUsername());
                header("Location: " . BASE_URL . "/admin/dashboard");
            }
        }

        $this->responseInterface->render("Security/sign_in.php");
    }

    #[Route(url: "/logout", name: "logout")]
    public function logout(): void
    {
        Session::destroy();

        header("Location: " . BASE_URL . "/admin/dashboard");
    }
}
