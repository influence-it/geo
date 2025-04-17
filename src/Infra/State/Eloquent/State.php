<?php

declare(strict_types=1);

namespace Influence\Geo\Infra\State\Eloquent;

use Influence\Core\Adapters\Laravel\Base\BaseModel;
use Influence\Geo\Domain\State\StateEntity;

class State extends BaseModel implements StateEntity
{

    protected $fillable = [
        'name',
        'abbr',
        'uuid',
    ];

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUf(): string
    {
        return $this->abbr;
    }


    public function getUuid(): string
    {
        return $this->uuid;
    }
}