<?php

declare(strict_types=1);

namespace App\Application\Responder\Acquirer\SellingTarget;

use App\Application\Responder\Responder;
use App\Domain\Acquirer\SellingTarget\NonNameSellingTarget;

class NonNameResponder implements Responder
{
    public function __construct(
        private readonly NonNameSellingTarget $sellingTarget
    ) {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->sellingTarget->id(),
            'catchPhrase' => $this->sellingTarget->catchPhrase(),
            'reason' => $this->sellingTarget->reason(),
            'area' => $this->sellingTarget->area(),
            'assets' => $this->sellingTarget->approximateAssets(),
            'previousPeriodFiscalSales' => $this->sellingTarget->approximatePreviousPeriodFiscalSales(),
            'previousPeriodProfitOrLoss' => $this->sellingTarget->approximatePreviousPeriodProfitOrLoss(),
            'currentPeriodFiscalSales' => $this->sellingTarget->approximateCurrentPeriodFiscalSales(),
            'currentPeriodProfitOrLoss' => $this->sellingTarget->approximateCurrentPeriodProfitOrLoss(),
            'numberOfExecutive' => $this->sellingTarget->approximateNumberOfExecutive(),
            'numberOfEmployee' => $this->sellingTarget->approximateNumberOfEmployee(),
        ];
    }
}
