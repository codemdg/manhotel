<?php

declare(strict_types=1);

namespace Core\Views;

class BlockBuilder
{
	private static array $blocks = [];

	private static ?string $currentBlock = null;

	public static function startBlock(string $name): void
	{
		self::$currentBlock = $name;
		ob_start();
	}

	public static function endBlock(): void
	{
		if (self::$currentBlock) {
			self::$blocks[self::$currentBlock] = ob_get_clean();
			self::$currentBlock = null;
		}
	}

	public static function renderBlock(string $name, string $defaultContent = "No content"): void
	{
		echo self::$blocks[$name] ?? $defaultContent;
	}
}
