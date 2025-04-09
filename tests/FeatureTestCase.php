<?php

namespace Tests;

use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\TestCase;

class FeatureTestCase extends TestCase
{
    use InteractsWithDatabase;
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->loadMigrationsFrom(__DIR__ . '/../vendor/influence-it/Core/src/Stubs/Database/Migrations');
        $this->loadMigrationsFrom(__DIR__ . '/../src/Adapters/Database/Migrations');
    }

    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set('database.default', 'mysql');
        $app['config']->set('database.connections.mysql', [
            'driver' => 'mysql',
            'host' => 'db-test',
            'port' => '3306',
            'database' => 'qop',
            'username' => 'qop',
            'password' => 'qop',
        ]);
    }

    protected function getPackageProviders($app): array
    {
        return [
        ];
    }

}