<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Influence\Geo\Infra\City\Http\ListCityByStateUuidController;
use Influence\Geo\Infra\State\Http\ListStateController;

return[

    Route::prefix('states')
        ->group(function () {
            Route::get('/', ListStateController::class);
            Route::get('/{uuid}/cities', ListCityByStateUuidController::class);
        }),
];