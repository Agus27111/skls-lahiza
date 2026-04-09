<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ppdb_registration_sequences', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('year')->unique();
            $table->unsignedInteger('current_number')->default(0);
            $table->timestamps();
        });

        Schema::table('ppdb_registrations', function (Blueprint $table) {
            $table->index(['school_unit_id', 'status'], 'ppdb_registrations_unit_status_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ppdb_registrations', function (Blueprint $table) {
            $table->dropIndex('ppdb_registrations_unit_status_index');
        });

        Schema::dropIfExists('ppdb_registration_sequences');
    }
};
