<?php

declare(strict_types=1);

namespace Tests\Feature\Infra\Eloquent;

use Tests\FeatureTestCase;

class GeoSeedTest extends FeatureTestCase
{
    public function testShouldGetTotalRowsInTheTable()
    {
        $this->assertDatabaseCount('states', 27);
        $this->assertDatabaseCount('cities', 5570);
    }
}