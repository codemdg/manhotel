<?php

declare(strict_types=1);

namespace App\Models;

use App\DataTransferObjects\PaginatorDto;
use Exception;
use PDO;
use PDOException;

class PaginatorModel extends AbstractModel
{
    public function createPaginator(string $tableName, int $limit, int $currentPage = 1): PaginatorDto
    {
        $paginatorDto = new PaginatorDto();
        $tempClass = new class {
            public int $total_items = 0;
        };
        $pdoStatement = $this->pdo->prepare("SELECT COUNT(*) AS total_items FROM $tableName");
        try {
            $pdoStatement->setFetchMode(PDO::FETCH_CLASS, get_class($tempClass));
            $pdoStatement->execute();
            $result = $pdoStatement->fetch();
        } catch (PDOException $e) {
            throw new Exception("Error count total items $tableName " . $e->getMessage());
        }
        $paginatorDto->total_items = $result->total_items;
        $paginatorDto->total_page = (int) round(($paginatorDto->total_items / $limit), 0, PHP_ROUND_HALF_UP);
        $offset = (int) (($currentPage - 1) * $limit);
        $paginatorDto->offset = $offset > 0 ? $offset : 0;
        $paginatorDto->limit = $limit;
        $paginatorDto->page = $currentPage;

        return $paginatorDto;
    }
}
