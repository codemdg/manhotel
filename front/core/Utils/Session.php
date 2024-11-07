<?php

declare(strict_types=1);

namespace Core\Utils;

class Session
{
	public static function setSession(string $key, mixed $value): void
	{
		$_SESSION[$key] = $value;
	}

	public static function removeSession(string $key): void
	{
		unset($_SESSION[$key]);
	}

	public static function getSession(string $key): mixed
	{
		return $_SESSION[$key];
	}
}
