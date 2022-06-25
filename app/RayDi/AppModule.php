<?php

declare(strict_types=1);

namespace App\RayDi;

use App\Attribute\Loggable;
use App\Console\Commands\HelloCommand;
use App\Domain\Double\Dobule;
use App\Domain\Double\DoubleInterface;
use App\Http\Controllers\HelloController;
use App\Http\Middleware\HiMiddleware;
use App\Interceptor\LoggerInterceptor;
use Illuminate\Database\DatabaseManager;
use Ray\Di\AbstractModule;

final class AppModule extends AbstractModule
{
    protected function configure(): void
    {
        $this->bind(DoubleInterface::class)->to(Dobule::class);
        $this->bindInterceptor(
            $this->matcher->any(),
            $this->matcher->annotatedWith(Loggable::class),
            [LoggerInterceptor::class]
        );
        $this->bind(DatabaseManager::class)->toProvider(DatabaseManagerProvider::class);
        $this->bind(HiMiddleware::class);
        $this->bind(HelloController::class);
        $this->bind(HelloCommand::class);
    }
}
