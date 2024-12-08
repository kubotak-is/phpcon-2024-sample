<?php

declare(strict_types=1);

namespace App\Domain\Acquirer\SellingTarget;

class SellingTargetBuilder
{
    /**
     * @param array<string, mixed> $data
     */
    public function build(array $data, bool $hasMatching): AbstractSellingTarget
    {
        if ($hasMatching) {
            return new NameClearSellingTarget(...$data);
        }
        return new NonNameSellingTarget(...$data);
    }
}
