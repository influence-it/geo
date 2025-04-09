<?php

declare(strict_types=1);

namespace Tests\Feature\Adapters\Database\Migrations;

use Tests\FeatureTestCase;

class CreateStatesAndCityMigrationTest extends FeatureTestCase
{

    public function testShouldGetTotalRowsInTheTable()
    {
        $this->assertDatabaseCount('states', 27);
        $this->assertDatabaseCount('cities', 5570);
    }
}