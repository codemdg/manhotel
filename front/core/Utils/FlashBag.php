<?php

declare(strict_types=1);

namespace Core\Utils;

class FlashBag
{
	public static function create(string $message): void
	{
		$_SESSION['bag'][] = $message;
	}

	public static function getMessages(): array|null
	{
		if (array_key_exists(key: "bag", array: $_SESSION)) {
			$messages = $_SESSION["bag"];
			unset($_SESSION["bag"]);

			return $messages;
		}

		return null;
	}

	public static function isThereMessageBag(): bool
	{
		return isset($_SESSION['bag']);
	}
}
