<?php

declare(strict_types=1);

namespace Core\Responses;

class BlockBuilder
{
	private array $blocks = [];

	private ?string $currentBlock = null;

	public function startBlock(string $name): void
	{
		$this->currentBlock = $name;
		ob_start();
	}

	public function endBlock(): void
	{
		if ($this->currentBlock) {
			$this->blocks[$this->currentBlock] = ob_get_clean();
			$this->currentBlock = null;
		}
	}

	public function renderBlock(string $name, string $defaultContent = "No content"): void
	{
		echo $this->blocks[$name] ?? $defaultContent;
	}
}
