<?php

declare(strict_types=1);

namespace Tests\Feature\Infra\City\Eloquent;

use Influence\Geo\Domain\City\CityRepository;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\FeatureTestCase;

class RepositoryTest extends FeatureTestCase
{
    private CityRepository $repository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = $this->app->make(CityRepository::class);
    }

    #[DataProvider('getStateScenarios')]
    public function testShouldGetAll(int $id, int $expected): void
    {
        // Actions
        $result = $this->repository->getByStateId(id: $id);

        // Assertions
        $this->assertSame($expected, $result->count()); //todo: The core collection dont implement the interface Countable yet
    }

    public static function getStateScenarios(): array
    {
        return [
            [
                'id' => 11,
                'expected' => 52,
            ],
            [
                'id' => 12,
                'expected' => 22,
            ],
            [
                'id' => 13,
                'expected' => 62,
            ],
            [
                'id' => 14,
                'expected' => 15,
            ],
            [
                'id' => 15,
                'expected' => 144,
            ],
            [
                'id' => 16,
                'expected' => 16,
            ],
            [
                'id' => 17,
                'expected' => 139,
            ],
            [
                'id' => 21,
                'expected' => 217,
            ],
            [
                'id' => 22,
                'expected' => 224,
            ],
            [
                'id' => 23,
                'expected' => 184,
            ],
            [
                'id' => 24,
                'expected' => 167,
            ],
            [
                'id' => 25,
                'expected' => 223,
            ],
            [
                'id' => 26,
                'expected' => 185,
            ],
            [
                'id' => 27,
                'expected' => 102,
            ],
            [
                'id' => 28,
                'expected' => 75,
            ],
            [
                'id' => 29,
                'expected' => 417,
            ],
            [
                'id' => 31,
                'expected' => 853,
            ],
            [
                'id' => 32,
                'expected' => 78,
            ],
            [
                'id' => 33,
                'expected' => 92,
            ],
            [
                'id' => 35,
                'expected' => 645,
            ],
            [
                'id' => 41,
                'expected' => 399,
            ],
            [
                'id' => 42,
                'expected' => 295,
            ],
            [
                'id' => 43,
                'expected' => 497,
            ],
            [
                'id' => 50,
                'expected' => 79,
            ],
            [
                'id' => 51,
                'expected' => 141,
            ],
            [
                'id' => 52,
                'expected' => 246,
            ],
            [
                'id' => 53,
                'expected' => 1,
            ],
        ];
    }
}