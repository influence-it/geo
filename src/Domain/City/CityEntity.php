<?php

declare(strict_types=1);

namespace Influence\Geo\Domain\City;

interface CityEntity
{
    public function getId(): int;

    public function getName(): string;

    public function getUuid(): string;
}