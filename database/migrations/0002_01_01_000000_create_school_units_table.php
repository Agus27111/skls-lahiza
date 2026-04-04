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
        Schema::create('school_units', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // TK Lahiza Sunnah, SD Lahiza Sunnah
            $table->string('slug')->unique();
            $table->text('description'); // Deskripsi tentang unit
            $table->text('philosophy'); // Filosofi pendidikan
            $table->integer('max_quota')->default(20); // Kuota maksimal siswa per kelas
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_units');
    }
};
