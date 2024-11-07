<?php

declare(strict_types=1);

namespace App\Controllers;

use Core\Attributes\Controller;
use Core\Attributes\Route;

#[Controller]
class DashboardController extends AbstractController
{
    #[Route(url: "/admin/dashboard", name: "admin_dashboard", isProtected: true)]
    public function home(): void
    {
        $this->responseInterface->render(view: "dashboard.php");
    }
}
