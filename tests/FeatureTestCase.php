<?php

namespace Tests;

use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;
use Influence\Geo\Infra\Eloquent\GeoSeeder;
use Orchestra\Testbench\TestCase;

class FeatureTestCase extends TestCase
{
    use InteractsWithDatabase;

    protected static bool $seeded = false;

    protected function setUp(): void
    {
        parent::setUp();

        $this->loadMigrationsFrom(__DIR__ . '/../vendor/influence-it/Core/src/Stubs/Database/Migrations');

        if (!static::$seeded) {
            $this->seed(GeoSeeder::class);
            static::$seeded = true;
        }
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

        require __DIR__ . '/../src/Infra/Shared/Http/routes.php';
    }

    protected function getPackageProviders($app): array
    {
        return [
            \Influence\Core\Adapters\Laravel\ServiceProvider::class,
            \Influence\Geo\ServiceProvider::class
        ];
    }

}