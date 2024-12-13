<?php

declare(strict_types=1);

namespace App\DataTransferObjects;

class PaginatorDto
{
    const DEFAULT_LIMIT_PAGE = 10;

    public int $offset = 0;
    public int $limit = self::DEFAULT_LIMIT_PAGE;
    public int $page = 1;
    public int $total_page = 0;
    public int $total_items = 0;
}
