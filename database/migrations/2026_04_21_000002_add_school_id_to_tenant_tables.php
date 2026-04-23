<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $this->addSchoolId('users');
        $this->addSchoolId('school_units');
        $this->addSchoolId('teachers');
        $this->addSchoolId('articles');
        $this->addSchoolId('announcements');
        $this->addSchoolId('video_documentations');
        $this->addSchoolId('photo_documentations');
        $this->addSchoolId('comments');
        $this->addSchoolId('hero_sections');
        $this->addSchoolId('about_pages');
        $this->addSchoolId('ppdb_payment_settings');
        $this->addSchoolId('ppdb_registration_sequences');
        $this->addSchoolId('ppdb_registrations');
    }

    public function down(): void
    {
        $this->dropSchoolId('ppdb_registrations');
        $this->dropSchoolId('ppdb_registration_sequences');
        $this->dropSchoolId('ppdb_payment_settings');
        $this->dropSchoolId('about_pages');
        $this->dropSchoolId('hero_sections');
        $this->dropSchoolId('comments');
        $this->dropSchoolId('photo_documentations');
        $this->dropSchoolId('video_documentations');
        $this->dropSchoolId('announcements');
        $this->dropSchoolId('articles');
        $this->dropSchoolId('teachers');
        $this->dropSchoolId('school_units');
        $this->dropSchoolId('users');
    }

    private function addSchoolId(string $tableName): void
    {
        if (! Schema::hasTable($tableName)) {
            return;
        }

        if (! Schema::hasColumn($tableName, 'school_id')) {
            Schema::table($tableName, function (Blueprint $table) {
                $table->foreignId('school_id')->nullable();
            });
        }

        if ($this->foreignKeyExists($tableName, '1')) {
            Schema::table($tableName, function (Blueprint $table) {
                $table->dropForeign('1');
            });
        }

        $constraintName = "{$tableName}_school_id_foreign";

        if ($this->foreignKeyExists($tableName, $constraintName)) {
            return;
        }

        Schema::table($tableName, function (Blueprint $table) use ($constraintName) {
            $table->foreign('school_id', $constraintName)
                ->references('id')
                ->on('schools')
                ->nullOnDelete();
        });
    }

    private function dropSchoolId(string $tableName): void
    {
        if (! Schema::hasTable($tableName) || ! Schema::hasColumn($tableName, 'school_id')) {
            return;
        }

        $constraintName = "{$tableName}_school_id_foreign";
        $hasNamedConstraint = $this->foreignKeyExists($tableName, $constraintName);
        $hasLegacyConstraint = $this->foreignKeyExists($tableName, '1');

        Schema::table($tableName, function (Blueprint $table) use ($constraintName, $hasNamedConstraint, $hasLegacyConstraint) {
            if ($hasNamedConstraint) {
                $table->dropForeign($constraintName);
            }

            if ($hasLegacyConstraint) {
                $table->dropForeign('1');
            }

            $table->dropColumn('school_id');
        });
    }

    private function foreignKeyExists(string $tableName, string $constraintName): bool
    {
        $database = Schema::getConnection()->getDatabaseName();

        $row = DB::selectOne(
            'select constraint_name
            from information_schema.key_column_usage
            where table_schema = ?
              and table_name = ?
              and constraint_name = ?
              and referenced_table_name is not null
            limit 1',
            [$database, $tableName, $constraintName],
        );

        return $row !== null;
    }
};
