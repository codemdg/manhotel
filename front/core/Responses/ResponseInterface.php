<?php

declare(strict_types=1);

namespace Core\Responses;

interface ResponseInterface
{
	/**
	 * @param string $view
	 * @param array $args
	 */
	function render(string $view, array $args = []): void;

	/**
	 *  @param string $view
	 *  @param array $args
	 */
	function renderView(string $view, array $args = []): void;
}
