<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Influence\Geo\Infra\Eloquent\GeoSeeder;

return new class extends Migration
{
    public function up(): void
    {

        if (!Schema::hasTable('cities')) {
            Artisan::call('db:seed', [
                '--class' => GeoSeeder::class,
            ]);
        }
    }

    public function down(): void
    {
        // do nothing
    }
};
