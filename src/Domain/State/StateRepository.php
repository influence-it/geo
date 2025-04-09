<?php

declare(strict_types=1);

namespace Influence\Geo\Domain\State;

interface StateRepository
{

    public function getAll(): StateCollection;

}