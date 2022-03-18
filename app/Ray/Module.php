<?php

declare(strict_types=1);

namespace App\Ray;

use App\Attribute\Loggable;
use App\Domain\Double\Dobule;
use App\Domain\Double\DoubleInterface;
use App\Interceptor\LoggerInterceptor;
use Ray\Di\AbstractModule;

final class Module extends AbstractModule
{
    protected function configure(): void
    {
        $this->bind(DoubleInterface::class)->to(Dobule::class);
        $this->bindInterceptor(
            $this->matcher->any(),
            $this->matcher->annotatedWith(Loggable::class),
            [LoggerInterceptor::class]
        );
    }
}
