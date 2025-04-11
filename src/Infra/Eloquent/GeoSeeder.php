<?php

declare(strict_types=1);

namespace Influence\Geo\Infra\Eloquent;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class GeoSeeder extends Seeder {
    public function run(): void
    {
        $path = __DIR__ . '/../../../.files/base.sql';

        if (!Schema::hasTable('states') || !Schema::hasTable('cities')) {
            DB::unprepared(file_get_contents($path));
        }

        if (!Schema::hasColumn('states', 'uuid')) {
            Schema::table('states', function ($table) {
                $table->uuid('uuid')->nullable()->after('id');
            });
        }

        if (!Schema::hasColumn('cities', 'uuid')) {
            Schema::table('cities', function ($table) {
                $table->uuid('uuid')->nullable()->after('id');
            });
        }

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
};
