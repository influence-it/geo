<?php

declare(strict_types=1);

namespace Influence\Geo\Infra\State\Eloquent;

use Influence\Geo\Domain\State\StateCollection;
use Influence\Geo\Domain\State\StateEntity;
use Influence\Geo\Domain\State\StateRepository;

class Repository implements StateRepository
{
    public function getAll(): StateCollection
    {
        return new StateCollection(
            State::query()
                ->orderBy('name')
                ->get()->all()
        );
    }

    public function getByUuid(string $uuid): StateEntity
    {
        return State::query()->where('uuid', $uuid)->firstOrFail();
    }

}