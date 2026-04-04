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
        Schema::create('ppdb_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number')->unique(); // REG-2026-XXXX
            $table->foreignId('school_unit_id')->constrained('school_units')->onDelete('cascade');

            // Data Calon Siswa
            $table->string('student_name');
            $table->date('student_birth_date');
            $table->string('student_gender')->nullable(); // Laki-laki, Perempuan
            $table->text('student_address')->nullable();

            // Data Orang Tua / Wali
            $table->string('parent_name');
            $table->string('parent_phone'); // WhatsApp number
            $table->string('parent_email')->nullable();
            $table->text('parent_address');
            $table->string('parent_relationship')->nullable(); // Ayah, Ibu, Wali

            // Status Pendaftaran
            $table->enum('status', ['pending', 'confirmed', 'rejected', 'accepted'])->default('pending');
            $table->decimal('registration_fee', 10, 2)->default(250000); // Rp 250.000
            $table->boolean('fee_paid')->default(false);

            $table->text('notes')->nullable(); // Catatan admin
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ppdb_registrations');
    }
};
