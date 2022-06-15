<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Wemanity;

use App\Domain\Wemanity\WemanityRepository;

class InMemoryWemanityRepository implements WemanityRepository
{
    private array $numbers;

    /**
     * @param string[]|null $numbers
     */
    public function __construct(array $numbers = null)
    {
        $this->numbers = $numbers ?? [1,2,3,4,5,6,7,8,9,10,13,15,21,33,51,53,101,303,105,10101,'15845qd54'];
    }

    /**
     * {@inheritdoc}
     */
    public function getAllNumbers(): array
    {
        return array_values($this->numbers);
    }
}
