<?php

declare(strict_types=1);

namespace Tests\Infrastructure\Persistence\Acquirer\SellingTarget;

use App\Domain\Acquirer\SellingTarget\SellingTargetRepository;
use Tests\TestCase;

class InMemorySellingTargetRepositoryTest extends TestCase
{
    public function testFindById(): void
    {
        $app = $this->getAppInstance();
        $container = $app->getContainer();
        $repository = $container->get(SellingTargetRepository::class);
        assert($repository instanceof SellingTargetRepository);

        $this->assertTrue($repository->findById(1)->isNonName());
        $this->assertFalse($repository->findById(1)->isNameClear());
        $this->assertFalse($repository->findById(2)->isNonName());
        $this->assertTrue($repository->findById(2)->isNameClear());
    }
}
