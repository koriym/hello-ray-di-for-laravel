<?php

declare(strict_types=1);

namespace App\Domain\Double;

final class Dobule implements DoubleInterface
{
    public function double(int $x): int
    {
        return $x * 2;
    }
}
