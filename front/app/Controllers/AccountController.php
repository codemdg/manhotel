<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\AccountModel;
use Core\Attributes\Controller;
use Core\Attributes\Route;

#[Controller]
class AccountController extends AbstractController
{
    #[Route(url: "/admin/list-accounts", name: "list_accounts")]
    public function listAccounts(): void
    {
        $accountModel = new AccountModel();

        $this->responseInterface->render("Accounts/list_accounts.php", ['accounts' => $accountModel->findAll()]);
    }

    #[Route(url: "/admin/add-account", name: "add_account")]
    public function addAccount(): void
    {
        if (!empty($_POST)) {
            $accountModel = new AccountModel();
            $accountModel->addNewAccount($_POST);
        }

        $this->responseInterface->render("Accounts/add_account.php");
    }
}
