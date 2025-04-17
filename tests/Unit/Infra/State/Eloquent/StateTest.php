<?php

declare(strict_types=1);

namespace Tests\Unit\Infra\State\Eloquent;

use Influence\Geo\Infra\State\Eloquent\State;
use Tests\UnitTestCase;

class StateTest extends UnitTestCase
{
    public function testShouldGetData(): void
    {
        // Set
        $expected = [
            'name' => 'São Paulo',
            'abbr' => 'SP',
            'uuid' => '123e4567-e89b-12d3-a456-426614174000',
        ];
        $state = new State($expected);

        // Expectations
        $this->assertSame($expected['name'], $state->getName());
        $this->assertSame($expected['abbr'], $state->getUf());
        $this->assertSame($expected['uuid'], $state->getUuid());
    }
}