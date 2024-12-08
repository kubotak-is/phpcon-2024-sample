<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Acquirer\SellingTarget;

use App\Domain\Acquirer\SellingTarget\AbstractSellingTarget;
use App\Domain\Acquirer\SellingTarget\Prefecture;
use App\Domain\Acquirer\SellingTarget\SellingTargetBuilder;
use App\Domain\Acquirer\SellingTarget\SellingTargetRepository;

class InMemorySellingTargetRepository implements SellingTargetRepository
{
    /**
     * @var array<string, \App\Domain\Acquirer\SellingTarget\Prefecture|string|int> $sellingTargetData
     */
    private array $sellingTargetData = [
        'catchPhrase' => 'キャッチフレーズ',
        'reason' => '売却理由',
        'prefecture' => Prefecture::Tokyo,
        'assets' => 100000000,
        'previousPeriodFiscalSales' => 10000000,
        'previousPeriodProfitOrLoss' => 10000000,
        'currentPeriodFiscalSales' => 10000000,
        'currentPeriodProfitOrLoss' => 10000000,
        'numberOfExecutive' => 5,
        'numberOfEmployee' => 30,
        'businessOverview' => '事業概要',
        'revenueStructure' => '収益構造',
        'salesCompositionRatio' => '売上構成比',
        'strengths' => '強み',
        'ceoName' => '金田餅太郎',
        'ceoPlaceOfOrigin' => Prefecture::Tokyo,
    ];

    /**
     * @var array|true[] $matchingIds
     */
    private array $matchingIds = [
        2 => true,
        5 => true,
    ];

    public function findById(int $sellingTargetId): AbstractSellingTarget
    {
        $matching = $this->matchingIds[$sellingTargetId] ?? false;
        return (new SellingTargetBuilder())->build(['sellingTargetId' => $sellingTargetId, ...$this->sellingTargetData], $matching);
    }
}
