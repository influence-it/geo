<?php

declare(strict_types=1);

namespace Tests\Feature\Infra\State\Eloquent;

use Influence\Geo\Domain\State\StateRepository;
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
}