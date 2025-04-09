<?php

declare(strict_types=1);

namespace InfluenceIt\Geo\Adapters\Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        $path = __DIR__ . '/../../../../.files/base.sql';
        DB::unprepared(file_get_contents($path));
    }

    public function down(): void
    {
        Schema::drop('cities');
        Schema::drop('states');
    }
};
