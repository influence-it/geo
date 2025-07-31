<?php

declare(strict_types=1);

namespace Influence\Geo\Infra\Eloquent;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Influence\Geo\ServiceProvider;

class GeoSeeder extends Seeder
{
    public function run(): void
    {
        if (Schema::hasTable('states') || Schema::hasTable('cities')) {
            return;
        }

        $path = ServiceProvider::GEO_SQL_BASE;

        DB::unprepared(file_get_contents($path));

        Schema::table('states', function ($table) {
            $table->uuid('uuid')->nullable()->after('id');
        });

        Schema::table('cities', function ($table) {
            $table->uuid('uuid')->nullable()->after('id');
        });

        DB::table('states')->whereNull('uuid')->get()->each(function ($state) {
            DB::table('states')
                ->where('id', $state->id)
                ->update(['uuid' => Str::uuid()->toString()]);
        });

        DB::table('cities')->whereNull('uuid')->get()->each(function ($city) {
            DB::table('cities')
                ->where('id', $city->id)
                ->update(['uuid' => Str::uuid()->toString()]);
        });

        Schema::table('states', function ($table) {
            $table->uuid('uuid')->unique()->nullable(false)->change();
        });

        Schema::table('cities', function ($table) {
            $table->uuid('uuid')->unique()->nullable(false)->change();
        });
    }
}

;
