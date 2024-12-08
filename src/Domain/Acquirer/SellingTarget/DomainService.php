<?php

declare(strict_types=1);

namespace App\Domain\Acquirer\SellingTarget;

class DomainService
{
    public function __construct(
        private readonly SellingTargetRepository $sellingTargetRepository
    ) {
    }

    public function getById(int $sellingTarget): AbstractSellingTarget
    {
        return $this->sellingTargetRepository->findById($sellingTarget);
    }
}
