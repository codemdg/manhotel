<?php

declare(strict_types=1);

namespace App\Controllers;

use Core\Responses\ResponseInterface;

abstract class AbstractController
{

    public function __construct(protected ResponseInterface $responseInterface) {}
}
