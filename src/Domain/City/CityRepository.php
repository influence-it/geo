<?php

declare(strict_types=1);

namespace Influence\Geo\Domain\City;

interface CityRepository
{

    public function getByStateId(): CityCollection;

}