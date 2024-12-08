<?php

declare(strict_types=1);

namespace App\Domain\Acquirer\SellingTarget;

interface SellingTargetRepository
{
    public function findById(int $sellingTargetId): AbstractSellingTarget;
}
