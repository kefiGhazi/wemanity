<?php

declare(strict_types=1);

use App\Domain\Wemanity\WemanityRepository;
use App\Infrastructure\Persistence\Wemanity\InMemoryWemanityRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        WemanityRepository::class => \DI\autowire(InMemoryWemanityRepository::class),
    ]);
};
