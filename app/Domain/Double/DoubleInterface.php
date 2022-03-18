<?php

declare(strict_types=1);

namespace App\Domain\Double;

interface DoubleInterface
{
    public function double(int $x): int;
}
