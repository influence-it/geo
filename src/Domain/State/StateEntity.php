<?php

declare(strict_types=1);

namespace Influence\Geo\Domain\State;

interface StateEntity
{
    public function getId(): int;

    public function getName(): string;

    public function getUuid(): string;
}