<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('school_id')->nullable()->constrained('schools')->nullOnDelete()->index();
        });

        Schema::table('school_units', function (Blueprint $table) {
            $table->foreignId('school_id')->nullable()->constrained('schools')->nullOnDelete()->index();
        });

        Schema::table('teachers', function (Blueprint $table) {
            $table->foreignId('school_id')->nullable()->constrained('schools')->nullOnDelete()->index();
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->foreignId('school_id')->nullable()->constrained('schools')->nullOnDelete()->index();
        });

        Schema::table('announcements', function (Blueprint $table) {
            $table->foreignId('school_id')->nullable()->constrained('schools')->nullOnDelete()->index();
        });

        Schema::table('video_documentations', function (Blueprint $table) {
            $table->foreignId('school_id')->nullable()->constrained('schools')->nullOnDelete()->index();
        });

        Schema::table('photo_documentations', function (Blueprint $table) {
            $table->foreignId('school_id')->nullable()->constrained('schools')->nullOnDelete()->index();
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->foreignId('school_id')->nullable()->constrained('schools')->nullOnDelete()->index();
        });

        Schema::table('hero_sections', function (Blueprint $table) {
            $table->foreignId('school_id')->nullable()->constrained('schools')->nullOnDelete()->index();
        });

        Schema::table('about_pages', function (Blueprint $table) {
            $table->foreignId('school_id')->nullable()->constrained('schools')->nullOnDelete()->index();
        });

        Schema::table('ppdb_payment_settings', function (Blueprint $table) {
            $table->foreignId('school_id')->nullable()->constrained('schools')->nullOnDelete()->index();
        });

        Schema::table('ppdb_registration_sequences', function (Blueprint $table) {
            $table->foreignId('school_id')->nullable()->constrained('schools')->nullOnDelete()->index();
        });

        Schema::table('ppdb_registrations', function (Blueprint $table) {
            $table->foreignId('school_id')->nullable()->constrained('schools')->nullOnDelete()->index();
        });
    }

    public function down(): void
    {
        Schema::table('ppdb_registrations', function (Blueprint $table) {
            $table->dropConstrainedForeignId('school_id');
        });

        Schema::table('ppdb_registration_sequences', function (Blueprint $table) {
            $table->dropConstrainedForeignId('school_id');
        });

        Schema::table('ppdb_payment_settings', function (Blueprint $table) {
            $table->dropConstrainedForeignId('school_id');
        });

        Schema::table('about_pages', function (Blueprint $table) {
            $table->dropConstrainedForeignId('school_id');
        });

        Schema::table('hero_sections', function (Blueprint $table) {
            $table->dropConstrainedForeignId('school_id');
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->dropConstrainedForeignId('school_id');
        });

        Schema::table('photo_documentations', function (Blueprint $table) {
            $table->dropConstrainedForeignId('school_id');
        });

        Schema::table('video_documentations', function (Blueprint $table) {
            $table->dropConstrainedForeignId('school_id');
        });

        Schema::table('announcements', function (Blueprint $table) {
            $table->dropConstrainedForeignId('school_id');
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->dropConstrainedForeignId('school_id');
        });

        Schema::table('teachers', function (Blueprint $table) {
            $table->dropConstrainedForeignId('school_id');
        });

        Schema::table('school_units', function (Blueprint $table) {
            $table->dropConstrainedForeignId('school_id');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropConstrainedForeignId('school_id');
        });
    }
};

