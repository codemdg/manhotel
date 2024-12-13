<?php

declare(strict_types=1);

namespace App\Utils;

use Core\Utils\FlashBag;

class MhFlashBag
{
    public static function showSuccessfullMessages(): void
    {
        if (FlashBag::isThereMessageBag()) {
            foreach (FlashBag::getMessages() as $message) {
                echo "<div  class='alert alert-success' role='alert'>" . $message . "</div>";
            }
        }
    }
}
