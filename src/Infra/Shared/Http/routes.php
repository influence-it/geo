<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Influence\Geo\Infra\City\Http\ListCityByStateUuidController;
use Influence\Geo\Infra\State\Http\ListStateController;

return[
    Route::get('states', ListStateController::class),
    Route::get('cities/{uuid}', ListCityByStateUuidController::class),
];