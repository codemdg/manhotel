<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\AccountModel;
use Core\Attributes\Controller;
use Core\Attributes\Route;
use Core\Utils\Session;

#[Controller]
class ProfileController extends AbstractController
{
    #[Route(url: "/admin/profile", name: "profile_account", isProtected: true)]
    public function showProfile(): void
    {
        $accountModel = new AccountModel();
        $accountDto = $accountModel->findAccountByUsername(Session::getSession(key: "username"));
        $this->responseInterface->render(view: "profile_account.php", args: ["accountDto" => $accountDto]);
    }
}
