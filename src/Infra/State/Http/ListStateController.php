<?php

declare(strict_types=1);

namespace Influence\Geo\Infra\State\Http;

use Illuminate\Http\JsonResponse;
use Influence\Core\Adapters\Laravel\Base\BaseController;
use Influence\Geo\Domain\State\StateCollection;
use Influence\Geo\Domain\State\StateEntity;
use Influence\Geo\Domain\State\StateRepository;

class ListStateController extends BaseController
{
    public function __invoke(StateRepository $stateRepository): JsonResponse
    {
        return response()->json([
            'message' => 'successful',
            'data' => $this->transform(
                stateCollection: $stateRepository->getAll(),
            ),
        ]);
    }

    private function transform(StateCollection $stateCollection): array
    {
        return array_map(fn(StateEntity $stateEntity) => [
            'uuid' => $stateEntity->getUuid(),
            'uf' => $stateEntity->getUf(),
            'name' => $stateEntity->getName(),
        ], $stateCollection->all());
    }

}