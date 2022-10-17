<?php

declare(strict_types=1);

namespace Tests\Feature;
use Tests\TestCase;

final class HelloTest extends TestCase
{
    public function testStatusOk(): void
    {
        $this->get('/hello')->assertOk();
    }

    public function testProductionContext(): void
    {
        putenv('APP_ENV=production');
        $this->app = $this->createApplication();
        $this->get('/hello')->assertOk();
        putenv('APP_ENV=testing');
    }
}
