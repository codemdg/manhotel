<?php

declare(strict_types=1);

namespace Core\Connectors;

use PDO;

interface ConnectorInterface
{
	function getPDO(): PDO;
}
