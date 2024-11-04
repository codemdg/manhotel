<?php

declare(strict_types=1);

namespace App\Controllers;

use Core\Attributes\Controller;
use Core\Attributes\Route;

#[Controller]
class RoomController extends AbstractController
{
    #[Route(url: "/add/room/V1", name: "add_room")]
    public function listRoom(): void
    {
        $this->responseInterface->render("Room/add_room.php");
    }
}
