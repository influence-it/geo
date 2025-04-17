<?php

declare(strict_types=1);

namespace Tests\Feature\Infra\State\Http;

use Illuminate\Testing\TestResponse;
use Tests\FeatureTestCase;

class ListStateControllerTest extends FeatureTestCase
{

    private TestResponse $response;

    public function testShouldGetAllStates(): void
    {
        // When
        $this->iTryGetAllStates();

        // Then
        $this->iSeeAllStates();
    }

    private function iTryGetAllStates(): void
    {
        $this->response = $this->getJson('states');
    }

    private function iSeeAllStates(): void
    {
        $this->response->assertStatus(200);
        $this->response->assertJsonCount(27, 'data');
        $this->response->assertJsonStructure([
            'message',
            'data' => [
                '*' => [
                    'uuid',
                    'uf',
                    'name',
                ],
            ],
        ]);
    }
}