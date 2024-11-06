<?php

declare(strict_types=1);

namespace App\Controllers;

use Core\Attributes\Controller;
use Core\Attributes\Route;

#[Controller]
class SharedController extends AbstractController
{

    #[Route(url: "/page/not-found", name: "page_not_found")]
    public function show404(): void
    {
        $this->responseInterface->render("404_page.php");
    }
}
