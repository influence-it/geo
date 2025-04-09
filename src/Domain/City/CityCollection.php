<?php

declare(strict_types=1);

namespace Influence\Geo\Domain\City;


use Influence\Core\Utils\Collection\BaseCollection;

class CityCollection extends BaseCollection
{
    public function getType(): string
    {
        return CityEntity::class;
    }

}