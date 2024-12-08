<?php

declare(strict_types=1);

use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our UserRepository interface to its in memory implementation
    $containerBuilder->addDefinitions([
        \App\Domain\Acquirer\SellingTarget\SellingTargetRepository::class
            => \DI\autowire(\App\Infrastructure\Persistence\Acquirer\SellingTarget\InMemorySellingTargetRepository::class),
    ]);
};
