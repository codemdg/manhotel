<?php

declare(strict_types=1);

namespace Core\Connectors;

use PDO;
use PDOException;
use Exception;

class MysqlConnector implements ConnectorInterface
{
	private ?PDO $pdo = null;

	public function __construct(private string $user, private string $password, private string $dbname, private string $host) {}

	public function getPDO(): PDO
	{
		try {
			if (null === $this->pdo) {
				$this->pdo = new PDO('mysql:host=' . $this->host . ';port=3306;dbname=' . $this->dbname, $this->user, $this->password);
			}
		} catch (PDOException $e) {
			throw new Exception("Error connecting to database " . $e->getMessage());
		}

		return $this->pdo;
	}
}
