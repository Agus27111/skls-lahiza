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
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('type')->default('info'); // info, warning, success, event
            $table->string('icon')->nullable(); // Lucide icon name untuk UI
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false); // Untuk ditampilkan di highlight

            // Relasi
            $table->foreignId('school_unit_id')->nullable()->constrained('school_units')->onDelete('set null'); // Unit tertentu atau untuk semua

            $table->timestamp('published_at')->nullable();
            $table->timestamp('archived_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};
