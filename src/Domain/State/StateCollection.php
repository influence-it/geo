<?php

declare(strict_types=1);

namespace Influence\Geo\Domain\State;

use Influence\Core\Utils\Collection\BaseCollection;

class StateCollection extends BaseCollection
{
    public function getType(): string
    {
        return StateEntity::class;
    }

}