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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama guru
            $table->string('slug')->unique();
            $table->text('title'); // Ustadz Ahmad, S.P. / Ustadzah Fatimah, S.Pd.
            $table->text('bio')->nullable(); // Biografi singkat
            $table->text('position'); // Kepala Sekolah, Koordinator TK, dll
            $table->string('image')->nullable(); // Avatar/Foto guru

            // Relasi ke unit (opsional, bisa mengajar di multiple units)
            $table->foreignId('school_unit_id')->nullable()->constrained('school_units')->onDelete('set null');

            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
