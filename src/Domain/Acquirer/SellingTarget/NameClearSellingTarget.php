<?php

declare(strict_types=1);

namespace App\Domain\Acquirer\SellingTarget;

class NameClearSellingTarget extends NonNameSellingTarget
{
    public function prefecture(): Prefecture
    {
        return $this->prefecture;
    }

    public function assets(): int
    {
        return $this->assets;
    }

    public function previousPeriodFiscalSales(): int
    {
        return $this->previousPeriodFiscalSales;
    }

    public function previousPeriodProfitOrLoss(): int
    {
        return $this->previousPeriodProfitOrLoss;
    }

    public function currentPeriodFiscalSales(): int
    {
        return $this->currentPeriodFiscalSales;
    }

    public function currentPeriodProfitOrLoss(): int
    {
        return $this->currentPeriodProfitOrLoss;
    }

    public function numberOfExecutive(): int
    {
        return $this->numberOfExecutive;
    }

    public function numberOfEmployee(): int
    {
        return $this->numberOfEmployee;
    }

    public function businessOverview(): string
    {
        return $this->businessOverview;
    }

    public function revenueStructure(): string
    {
        return $this->revenueStructure;
    }

    public function salesCompositionRatio(): string
    {
        return $this->salesCompositionRatio;
    }

    public function strengths(): string
    {
        return $this->strengths;
    }

    public function ceoName(): string
    {
        return $this->ceoName;
    }

    public function ceoPlaceOfOrigin(): Prefecture
    {
        return $this->ceoPlaceOfOrigin;
    }
}
