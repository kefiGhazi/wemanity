<?php

declare(strict_types=1);

namespace App\Domain\Wemanity;

interface WemanityRepository
{
    /**
     * @return array
     */
    public function getAllNumbers(): array;
}
