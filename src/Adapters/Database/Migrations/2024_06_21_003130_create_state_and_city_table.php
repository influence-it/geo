<?php

declare(strict_types=1);

namespace InfluenceIt\Geo\Adapters\Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration {
    public function up(): void
    {
        $path = __DIR__ . '/../../../../.files/base.sql';
        DB::unprepared(file_get_contents($path));

        // Add uuid column to both tables
        Schema::table('states', function (Blueprint $table) {
            $table->uuid()->nullable()->after('id');
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->uuid()->nullable()->after('id');
        });

        // Update all existing records with generated UUIDs
        DB::table('states')->get()->each(function ($state) {
            DB::table('states')
                ->where('id', $state->id)
                ->update(['uuid' => Str::uuid()->toString()]);
        });

        DB::table('cities')->get()->each(function ($city) {
            DB::table('cities')
                ->where('id', $city->id)
                ->update(['uuid' => Str::uuid()->toString()]);
        });

        // Make the uuid columns not nullable and unique
        Schema::table('states', function (Blueprint $table) {
            $table->uuid()->nullable(false)->unique()->change();
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->uuid()->nullable(false)->unique()->change();
        });
    }

    public function down(): void
    {
        Schema::drop('cities');
        Schema::drop('states');
    }
};
