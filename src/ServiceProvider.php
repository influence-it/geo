<?php

declare(strict_types=1);

namespace Influence\Geo;

use Influence\Core\Adapters\Laravel\Base\BaseServiceProvider;
use Influence\Geo\Domain\State\StateRepository;
use Influence\Geo\Infra\State\Eloquent\Repository;

class ServiceProvider extends BaseServiceProvider
{
    public array $singletons = [
        StateRepository::class => Repository::class,
    ];
}