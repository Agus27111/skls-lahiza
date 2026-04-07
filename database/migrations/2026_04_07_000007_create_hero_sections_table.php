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
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();
            $table->string('eyebrow_text');
            $table->string('title_prefix');
            $table->string('title_highlight');
            $table->string('title_suffix');
            $table->text('description');
            $table->string('primary_button_label');
            $table->string('primary_button_url');
            $table->string('secondary_button_label');
            $table->string('secondary_button_url');
            $table->string('image_path');
            $table->string('image_alt')->nullable();
            $table->string('floating_badge_label')->nullable();
            $table->string('floating_badge_text')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};
