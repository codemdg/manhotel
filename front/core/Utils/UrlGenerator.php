<?php

declare(strict_types=1);

namespace Core\Utils;

class UrlGenerator
{
	public static function generate(string $route): string
	{
		return BASE_URL . $route;
	}
}
