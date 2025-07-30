<?php

declare(strict_types=1);

namespace Influence\Geo;

use Influence\Core\Adapters\Laravel\Base\BaseServiceProvider;
use Influence\Geo\Domain\City\CityRepository;
use Influence\Geo\Domain\State\StateRepository;

class ServiceProvider extends BaseServiceProvider
{
    const string GEO_SQL_BASE = __DIR__.'/../sql/base.sql';

    public array $singletons = [
        StateRepository::class => Infra\State\Eloquent\Repository::class,
        CityRepository::class => Infra\City\Eloquent\Repository::class,
    ];

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/Infra/Database/Migrations' => database_path('migrations'),
        ], 'geo-migrations');
    }
}