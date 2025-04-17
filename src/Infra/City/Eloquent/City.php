<?php

declare(strict_types=1);

namespace Influence\Geo\Infra\City\Eloquent;

use Influence\Geo\Domain\City\CityEntity;
use Influence\Core\Adapters\Laravel\Base\BaseModel;

class City extends BaseModel implements CityEntity
{
    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

}