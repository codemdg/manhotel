<?php

declare(strict_types=1);

namespace App\Controllers;

use Core\Attributes\Controller;
use Core\Attributes\Route;

#[Controller]
class ProfileController extends AbstractController
{

    #[Route(url: "/admin/profile", name: "profile_account", isProtected: true)]
    public function showProfile(): void
    {
        $this->responseInterface->render(view: "profile_account.php");
    }
}
