<?php

declare(strict_types=1);

namespace Core\Attributes;

use Attribute;

#[Attribute]
class Route
{
	public function __construct(private string $url, private string $name, private bool $isProtected = false) {}

	public function getName(): string
	{
		return $this->name;
	}

	public function getUrl(): string
	{
		return $this->url;
	}

	public function isProtected(): bool
	{
		return $this->isProtected;
	}
}
