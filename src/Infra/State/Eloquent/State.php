<?php

declare(strict_types=1);

namespace Influence\Geo\Infra\State\Eloquent;

use Influence\Core\Adapters\Laravel\Base\BaseModel;
use Influence\Geo\Domain\State\StateEntity;

class State extends BaseModel implements StateEntity
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