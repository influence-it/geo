<?php

declare(strict_types=1);

namespace Tests\Feature\Infra\State\Eloquent;

use Influence\Geo\Domain\State\StateRepository;
use Influence\Geo\Infra\State\Eloquent\State;
use Tests\FeatureTestCase;

class RepositoryTest extends FeatureTestCase
{
    private StateRepository $repository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = $this->app->make(StateRepository::class);
    }

    public function testShouldGetAll(): void
    {
        // Set
        $expected = 27;

        // Actions
        $result = $this->repository->getAll();

        // Assertions
        $this->assertSame($expected, $result->count()); //todo: The core collection dont implement the interface Countable yet
    }

    public function testShouldGetByUuid(): void
    {
        // Set
        $stateByUf = State::where('abbr', 'SP')->first();

        // Actions
        $result = $this->repository->getByUuid($stateByUf->uuid);

        // Assertions
        $this->assertSame($stateByUf->uuid, $result->uuid);
    }
}