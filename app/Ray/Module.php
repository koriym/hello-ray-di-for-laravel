<?php

declare(strict_types=1);

namespace App\Ray;

use App\Domain\Double\Dobule;
use App\Domain\Double\DoubleInterface;
use Ray\Di\AbstractModule;

final class Module extends AbstractModule
{
    protected function configure(): void
    {
        $this->bind(DoubleInterface::class)->to(Dobule::class);
    }
}
