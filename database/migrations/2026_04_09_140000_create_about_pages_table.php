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
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();
            $table->string('eyebrow_text');
            $table->string('hero_title');
            $table->text('hero_description');
            $table->string('history_title');
            $table->json('history_paragraphs');
            $table->string('history_image_path')->nullable();
            $table->string('history_image_alt')->nullable();
            $table->text('vision_text');
            $table->text('mission_text');
            $table->text('goal_text');
            $table->string('core_values_heading')->default('Nilai-Nilai Inti Kami');
            $table->json('core_values');
            $table->string('school_units_heading')->default('Unit Pendidikan Kami');
            $table->text('school_units_description')->nullable();
            $table->string('teachers_heading')->default('Murobbi & Fasilitator Kami');
            $table->text('teachers_description')->nullable();
            $table->string('facilities_title');
            $table->json('facilities');
            $table->string('facilities_image_path')->nullable();
            $table->string('facilities_image_alt')->nullable();
            $table->string('programs_title');
            $table->json('programs');
            $table->string('cta_title');
            $table->text('cta_description');
            $table->string('cta_primary_label');
            $table->string('cta_primary_url');
            $table->string('cta_secondary_label');
            $table->string('cta_secondary_url');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_pages');
    }
};
