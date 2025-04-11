<?php

declare(strict_types=1);

namespace Influence\Geo;

use Influence\Core\Base\BaseModule;
use Influence\Core\Traits\HasMigration;
use Influence\Core\Traits\HasServiceProvider;
use Influence\Core\Traits\IsPackage;

class GeoModule extends BaseModule
{

    use HasMigration;

    use HasServiceProvider;

    use IsPackage;

    public function name(): string
    {
        return 'Geo';
    }

    public function getPackageName(): string
    {
        return 'geo';
    }
}

