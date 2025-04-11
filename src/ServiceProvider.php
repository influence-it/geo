<?php

declare(strict_types=1);

namespace Influence\Geo;

use Influence\Core\Adapters\Laravel\Base\BaseServiceProvider;
use Influence\Geo\Domain\City\CityRepository;
use Influence\Geo\Domain\State\StateRepository;

class ServiceProvider extends BaseServiceProvider
{
    public array $singletons = [
        StateRepository::class => Infra\State\Eloquent\Repository::class,
        CityRepository::class => Infra\City\Eloquent\Repository::class,
    ];
}