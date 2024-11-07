<?php

declare(strict_types=1);

namespace Core\Responses;

class HtmlResponse implements ResponseInterface
{
	public function render(string $view, array $args = []): void
	{
		$defaultView = "default.php";
		if (!empty($args)) {
			extract($args);
		}
		require ROOT_APP . "/Views/" . $view;

		//add this content to the main template
		require ROOT_APP . "/Views/$defaultView";
	}
}
