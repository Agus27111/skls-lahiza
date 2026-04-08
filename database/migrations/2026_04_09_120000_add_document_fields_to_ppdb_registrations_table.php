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
        Schema::table('ppdb_registrations', function (Blueprint $table) {
            $table->string('family_card_path')->nullable()->after('parent_relationship');
            $table->string('father_id_card_path')->nullable()->after('family_card_path');
            $table->string('mother_id_card_path')->nullable()->after('father_id_card_path');
            $table->string('birth_certificate_path')->nullable()->after('mother_id_card_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ppdb_registrations', function (Blueprint $table) {
            $table->dropColumn([
                'family_card_path',
                'father_id_card_path',
                'mother_id_card_path',
                'birth_certificate_path',
            ]);
        });
    }
};
