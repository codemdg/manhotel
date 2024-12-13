<?php

declare(strict_types=1);

namespace App\Controllers;

use App\DataTransferObjects\AccountDto;
use App\Models\AccountModel;
use App\Models\PaginatorModel;
use Core\Attributes\Controller;
use Core\Attributes\Route;
use Core\Utils\FlashBag;

#[Controller]
class AccountController extends AbstractController
{
    #[Route(url: "/admin/list-accounts", name: "list_accounts")]
    public function listAccounts(): void
    {
        $accountModel = new AccountModel();
        $paginatorModel = new PaginatorModel();
        $page = $_GET['page'] ?? 1;
        $paginatorDto = $paginatorModel->createPaginator(AccountModel::TABLE_ACCOUNT_NAME, AccountModel::LIMIT_ROW, intval($page));
        $accounts = $accountModel->findAll($paginatorDto);

        $this->responseInterface->render("Accounts/list_accounts.php", ['accounts' => $accounts, 'paginatorDto' => $paginatorDto]);
    }

    #[Route(url: "/admin/add-account", name: "add_account")]
    public function addAccount(): void
    {
        if (!empty($_POST)) {
            $accountModel = new AccountModel();
            $accountModel->addNewAccount($_POST);
            FlashBag::create(message: "Account added successfully!");
            header("Location: " . BASE_URL . "/admin/list-accounts");
        }

        $this->responseInterface->render("Accounts/add_account.php");
    }

    #[Route(url: "/admin/edit-account", name: "edit_account")]
    public function editAccount(): void
    {
        $accountModel = new AccountModel();
        $accountDto = $accountModel->findAccountById(intval($_GET['id']));

        if (!empty($_POST)) {
            $accountModel->saveAccount($_POST, intval($_GET['id']));
            FlashBag::create(message: "Account saved successfully!");
            header("Location: " . BASE_URL . "/admin/list-accounts");
        }

        $this->responseInterface->render("Accounts/edit_account.php", [
            'accountDto' => $accountDto
        ]);
    }

    #[Route(url: "/admin/delete-account", name: "delete_account")]
    public function deleteAccount(): void
    {
        $accountModel = new AccountModel();
        if (!empty($_GET) && isset($_GET["id"])) {
            $accountModel->deleteAccount(intval($_GET['id']));
            FlashBag::create(message: "Account id:" . $_GET['id'] . " deleted successfully!");
        }

        header("Location: " . BASE_URL . "/admin/list-accounts");
    }

    #[Route(url: "/admin/detail-account", name: "detail_account")]
    public function detailAccount(): void
    {
        $accountDto = new AccountDto();
        if (!empty($_GET) && isset($_GET['id'])) {
            $accountModel = new AccountModel();
            $accountDto = $accountModel->findAccountById(intval($_GET['id']));
        }

        $this->responseInterface->renderView("Accounts/detail_account.php", ['accountDto' => $accountDto]);
    }
}
