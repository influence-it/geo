<?php

declare(strict_types=1);

namespace Influence\Geo\Infra\City\Eloquent;

use Influence\Geo\Domain\City\CityCollection;
use Influence\Geo\Domain\City\CityRepository;

class Repository implements CityRepository
{
    public function getByStateId(int $id): CityCollection
    {
        $cities = City::query()
            ->where('state_id', $id)
            ->get();

        return new CityCollection($cities->all());
    }
}