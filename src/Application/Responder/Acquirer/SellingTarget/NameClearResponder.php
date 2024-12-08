<?php

declare(strict_types=1);

namespace App\Application\Responder\Acquirer\SellingTarget;

use App\Application\Responder\Responder;
use App\Domain\Acquirer\SellingTarget\NameClearSellingTarget;

class NameClearResponder implements Responder
{
    public function __construct(
        private readonly NameClearSellingTarget $sellingTarget
    ) {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->sellingTarget->id(),
            'catchPhrase' => $this->sellingTarget->catchPhrase(),
            'reason' => $this->sellingTarget->reason(),
            'area' => $this->sellingTarget->area(),
            'prefecture' => $this->sellingTarget->prefecture(),
            'assets' => $this->sellingTarget->assets(),
            'previousPeriodFiscalSales' => $this->sellingTarget->previousPeriodFiscalSales(),
            'previousPeriodProfitOrLoss' => $this->sellingTarget->previousPeriodProfitOrLoss(),
            'currentPeriodFiscalSales' => $this->sellingTarget->currentPeriodFiscalSales(),
            'currentPeriodProfitOrLoss' => $this->sellingTarget->currentPeriodProfitOrLoss(),
            'numberOfExecutive' => $this->sellingTarget->numberOfExecutive(),
            'numberOfEmployee' => $this->sellingTarget->numberOfEmployee(),
            'businessOverview' => $this->sellingTarget->businessOverview(),
            'revenueStructure' => $this->sellingTarget->revenueStructure(),
            'salesCompositionRatio' => $this->sellingTarget->salesCompositionRatio(),
            'strengths' => $this->sellingTarget->strengths(),
            'ceoName' => $this->sellingTarget->ceoName(),
            'ceoPlaceOfOrigin' => $this->sellingTarget->ceoPlaceOfOrigin(),
        ];
    }
}
