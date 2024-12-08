<?php

declare(strict_types=1);

namespace App\Domain\Acquirer\SellingTarget;

abstract class AbstractSellingTarget
{
    public function __construct(
        protected int $sellingTargetId,
        protected string $catchPhrase,
        protected string $reason,
        protected Prefecture $prefecture,
        protected int $assets,
        protected int $previousPeriodFiscalSales,
        protected int $previousPeriodProfitOrLoss,
        protected int $currentPeriodFiscalSales,
        protected int $currentPeriodProfitOrLoss,
        protected int $numberOfExecutive,
        protected int $numberOfEmployee,
        protected string $businessOverview,
        protected string $revenueStructure,
        protected string $salesCompositionRatio,
        protected string $strengths,
        protected string $ceoName,
        protected Prefecture $ceoPlaceOfOrigin,
    ) {
    }

    public function id(): int
    {
        return $this->sellingTargetId;
    }

    /**
     * @phpstan-assert-if-true NonNameSellingTarget $this
     */
    public function isNonName(): bool
    {
        return get_class($this) === NonNameSellingTarget::class;
    }

    /**
     * @phpstan-assert-if-true NameClearSellingTarget $this
     */
    public function isNameClear(): bool
    {
        return get_class($this) === NameClearSellingTarget::class;
    }
}
