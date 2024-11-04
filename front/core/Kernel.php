<?php

declare(strict_types=1);

namespace Core;

define('BASE_URL', $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST']);

use Core\Attributes\Controller;
use Core\Responses\HtmlResponse;
use ReflectionClass;

class Kernel
{
	public function __construct(private string $uri)
	{
		$this->loadControllers();
	}


	public function handleRequest(): void
	{
		$classes = get_declared_classes();
		foreach ($classes as $class) {
			$reflectionClass = new ReflectionClass($class);
			$controllerAttribute = $reflectionClass->getAttributes(Controller::class);
			if (!empty($controllerAttribute)) {
				foreach ($reflectionClass->getMethods() as $method) {
					foreach ($method->getAttributes() as $attribute) {
						$args = $attribute->getArguments();
						if ($args['url'] === $_SERVER['REQUEST_URI']) {
							$instance = $reflectionClass->newInstance(new HtmlResponse());
							$method->invoke($instance);
							break 3;
						}
					}
				}
			}
		}
	}

	private function loadControllers(): void
	{
		$directory = ROOT_APP . "/Controllers";
		foreach (glob($directory . '/*.php') as $file) {
			require_once $file;
		}
	}
}