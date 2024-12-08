<?php

declare(strict_types=1);

namespace App\Domain\Acquirer\SellingTarget;

class NonNameSellingTarget extends AbstractSellingTarget
{
    private const array APPROXIMATE_PRICE_TABLE = [
        -10000000000 => "△100億円〜",
        -5000000000 => "△50億円〜△100億円",
        -3000000000 => "△30億円〜△50億円",
        -1000000000 => "△10億円〜△30億円",
        -500000000 => "△5億円〜△10億円",
        -300000000 => "△3億円〜△5億円",
        -100000000 => "△1億円〜△3億円",
        -50000000 => "△5,000万円〜△1億円",
        -30000000 => "△3,000万円〜△5,000万円",
        -10000000 => "△1,000万円〜△3,000万円",
        -5000000 => "△500万円〜△1,000万円",
        -3000000 => "△300万円〜△500万円",
        -1000000 => "△100万円〜△300万円",
        0 => "0円〜△100万円",
        1000000 => "0円〜100万円",
        3000000 => "100万円〜300万円",
        5000000 => "300万円〜500万円",
        10000000 => "500万円〜1,000万円",
        30000000 => "1,000万円〜3,000万円",
        50000000 => "3,000万円〜5,000万円",
        100000000 => "5,000万円〜1億円",
        300000000 => "1億円〜3億円",
        500000000 => "3億円〜5億円",
        1000000000 => "5億円〜10億円",
        3000000000 => "10億円〜30億円",
        5000000000 => "30億円〜50億円",
        10000000000 => "50億円〜100億円",
        100000000000000 => "100億円〜",
    ];

    private const array APPROXIMATE_PEOPLE_TABLE = [
        5 => "〜5人",
        10 => "5人〜10人",
        30 => "10人〜30人",
        50 => "30人〜50人",
        100 => "50人〜100人",
        300 => "100人〜300人",
        500 => "300人〜500人",
        1000 => "500人〜1,000人",
        10000000000 => "1,000人〜",
    ];

    public function catchPhrase(): string
    {
        return $this->catchPhrase;
    }

    public function reason(): string
    {
        return $this->reason;
    }

    public function area(): Area
    {
        return $this->prefecture->area();
    }

    /**
     * @param array<int, string> $const
     */
    private function toApproximateNumber(int $value, array $const): string
    {
        $keys = array_keys($const);
        for ($i = 0; $i < count($keys) - 1; $i++) {
            // ちょうど境界に当たる部分の数字は上に含めるため比較演算子は < とする
            if ($value < $keys[$i]) {
                return $const[$keys[$i]];
            }
        }
        // 非常に大きい数字の場合は一番最後の要素にする
        return $const[$keys[count($keys) - 1]];
    }

    public function approximateAssets(): string
    {
        return $this->toApproximateNumber($this->assets, self::APPROXIMATE_PRICE_TABLE);
    }

    public function approximatePreviousPeriodFiscalSales(): string
    {
        return $this->toApproximateNumber($this->previousPeriodFiscalSales, self::APPROXIMATE_PRICE_TABLE);
    }

    public function approximatePreviousPeriodProfitOrLoss(): string
    {
        return $this->toApproximateNumber($this->previousPeriodProfitOrLoss, self::APPROXIMATE_PRICE_TABLE);
    }

    public function approximateCurrentPeriodFiscalSales(): string
    {
        return $this->toApproximateNumber($this->currentPeriodFiscalSales, self::APPROXIMATE_PRICE_TABLE);
    }

    public function approximateCurrentPeriodProfitOrLoss(): string
    {
        return $this->toApproximateNumber($this->currentPeriodProfitOrLoss, self::APPROXIMATE_PRICE_TABLE);
    }

    public function approximateNumberOfExecutive(): string
    {
        return $this->toApproximateNumber($this->numberOfExecutive, self::APPROXIMATE_PEOPLE_TABLE);
    }

    public function approximateNumberOfEmployee(): string
    {
        return $this->toApproximateNumber($this->numberOfEmployee, self::APPROXIMATE_PEOPLE_TABLE);
    }
}
