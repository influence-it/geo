<?php

declare(strict_types=1);

namespace Influence\Geo\Infra\City\Http;

use Illuminate\Http\JsonResponse;
use Influence\Core\Adapters\Laravel\Base\BaseController;
use Influence\Geo\Domain\City\CityCollection;
use Influence\Geo\Domain\City\CityEntity;
use Influence\Geo\Domain\City\CityRepository;
use Influence\Geo\Domain\State\StateRepository;

class ListCityByStateUuidController extends BaseController
{
    public function __invoke(StateRepository $stateRepository, CityRepository $cityRepository, string $uuid): JsonResponse
    {

        $state = $stateRepository->getByUuid(uuid: $uuid);

        $cities = $cityRepository->getByStateId(id: $state->getId());

        return response()->json([
            'message' => 'successful',
            'data' => $this->transform(
                stateCollection: $cities
            ),
        ]);
    }

    private function transform(CityCollection $stateCollection): array
    {
        return array_map(fn(CityEntity $cityEntity) => [
            'uuid' => $cityEntity->getUuid(),
            'name' => $cityEntity->getName(),
        ], $stateCollection->all());
    }

}