<?php

declare(strict_types=1);

namespace Influence\Geo\Infra\City\Eloquent;

use Influence\Geo\Domain\City\CityEntity;
use Influence\Core\Adapters\Laravel\Base\BaseModel;

class City extends BaseModel implements CityEntity
{
    public function getId(): int
    {
        // TODO: Implement getId() method.
    }

    public function getName(): string
    {
        // TODO: Implement getName() method.
    }

    public function getUuid(): string
    {
        // TODO: Implement getUuid() method.
    }

}