<?php

declare(strict_types=1);

namespace Tests\Feature\Infra\City\Http;

use Illuminate\Testing\TestResponse;
use Influence\Geo\Infra\State\Eloquent\State;
use Tests\FeatureTestCase;

class ListCityByStateUuidControllerTest extends FeatureTestCase
{

    private TestResponse $response;

    private State $state;

    public function testShouldGetAllCitiesByStateUuid(): void
    {
        // Given
        $this->iHaveTheUuidOfTheStateOfSaoPaulo();

        // When
        $this->iTryGetAllCities();

        // Then
        $this->iSeeAllCities();
    }

    private function iTryGetAllCities(): void
    {
        $this->response = $this->getJson('cities/' . $this->state->uuid);
    }

    private function iSeeAllCities(): void
    {
        $this->response->assertStatus(200);
        $this->response->assertJsonCount(645, 'data');
        $this->response->assertJsonStructure([
            'message',
            'data' => [
                '*' => [
                    'uuid',
                    'name',
                ],
            ],
        ]);
    }

    private function iHaveTheUuidOfTheStateOfSaoPaulo(): void
    {
        $this->state = State::where('abbr', 'SP')->firstOrFail();
    }
}