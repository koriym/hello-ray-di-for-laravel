<?php

declare(strict_types=1);

namespace App\Ray;

use Illuminate\Database\DatabaseManager;

final class DatabaseManagerProvider extends AbstractIlluminateContainerProvider
{
    protected function getAbstract(): string
    {
        return DatabaseManager::class;
    }
}
