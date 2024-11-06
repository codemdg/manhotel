<?php

declare(strict_types=1);

namespace App\Models;

use App\DataTransferObjects\AccountLoginDto;
use App\Requests\LoginRequest;
use Core\Utils\FlashBag;

class AuthenticateModel extends AbstractModel
{
    public function __construct(private AccountModel $accountModel)
    {
        parent::__construct();
    }

    public function authenticate(LoginRequest $loginRequest): AccountLoginDto
    {
        //Check if the account exists
        if (!$this->accountModel->isAccountExists($loginRequest->getUsername())) {
            //update message error to display in form login
            FlashBag::create(message: "No account linked with " . $loginRequest->getUsername());
            return new AccountLoginDto(null, null, null, null);
        }

        //Verify if the password is correct
        $accountLoginDto = $this->accountModel->findAccountByUsername($loginRequest->getUsername());
        if (sha1($loginRequest->getPassword()) !== $accountLoginDto->getPassword()) {
            //update message error to display in form login
            FlashBag::create(message: "Invalid password");
            return new AccountLoginDto(null, null, null, null);
        }

        return $accountLoginDto;
    }
}
