<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('schools', function (Blueprint $table) {
            $table->string('primary_color')->nullable()->after('phone');
            $table->string('secondary_color')->nullable()->after('primary_color');
            $table->string('font_sans')->nullable()->after('secondary_color');
            $table->string('filament_primary')->nullable()->after('font_sans');
        });
    }

    public function down(): void
    {
        Schema::table('schools', function (Blueprint $table) {
            $table->dropColumn(['primary_color', 'secondary_color', 'font_sans', 'filament_primary']);
        });
    }
};
