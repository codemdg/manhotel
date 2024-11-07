<?php

declare(strict_types=1);

namespace App\Controllers;

use Core\Controllers\SecurityInterface;
use Core\Responses\ResponseInterface;
use Core\Utils\Session;

abstract class AbstractController implements SecurityInterface
{

    public function __construct(protected ResponseInterface $responseInterface) {}

    public function checkAuthenticatedSession(): void
    {
        if (null === Session::getSession(key: "auth")) {
            header("Location:" . BASE_URL . "/login");
        }
    }
}
