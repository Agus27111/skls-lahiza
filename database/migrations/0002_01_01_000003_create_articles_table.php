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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt'); // Ringkasan artikel
            $table->longText('content'); // Konten artikel lengkap
            $table->string('category'); // Edukasi, Adab, Parenting, dll
            $table->string('image')->nullable(); // Featured image
            $table->foreignId('teacher_id')->nullable()->constrained('teachers')->onDelete('set null'); // Author

            $table->boolean('published')->default(false);
            $table->timestamp('published_at')->nullable();

            $table->integer('views')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
