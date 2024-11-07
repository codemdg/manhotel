<?php

declare(strict_types=1);

namespace Core\Controllers;

interface SecurityInterface
{
	function checkAuthenticatedSession(): void;
}
