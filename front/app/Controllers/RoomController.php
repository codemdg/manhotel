<?php

declare(strict_types=1);

namespace App\Controllers;

use Core\Attributes\Controller;
use Core\Attributes\Route;

#[Controller]
class RoomController
{
    #[Route(url: "/list/rooms", name: "list_rooms")]
    public function listRoom(): void
    {
        echo "<p> list rooms </p>";
    }
}
