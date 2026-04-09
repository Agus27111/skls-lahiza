<?php

use App\Models\PpdbRegistration;
use App\Models\SchoolUnit;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

function ppdbPayload(array $overrides = []): array
{
    return array_merge([
        'student_name' => 'Calon Siswa',
        'student_birth_date' => '2020-01-01',
        'school_unit_code' => 'TK',
        'parent_name' => 'Orang Tua',
        'parent_phone' => '081234567890',
        'parent_address' => 'Jl. Pengujian No. 1',
        'family_card_file' => UploadedFile::fake()->image('kk.jpg'),
        'father_id_card_file' => UploadedFile::fake()->image('ktp-ayah.jpg'),
        'mother_id_card_file' => UploadedFile::fake()->image('ktp-ibu.jpg'),
        'birth_certificate_file' => UploadedFile::fake()->image('akte.jpg'),
    ], $overrides);
}

function ensureOptionalCmsTablesExist(): void
{
    if (! Schema::hasTable('hero_sections')) {
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_ppdb_active')->default(true);
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
        });
    }
}

it('creates the next registration number from the atomic yearly sequence', function () {
    Storage::fake('public');
    ensureOptionalCmsTablesExist();

    $schoolUnit = SchoolUnit::factory()->create([
        'name' => 'TK Lahiza Sunnah',
        'slug' => 'tk-lahiza',
        'max_quota' => 10,
        'is_active' => true,
    ]);

    PpdbRegistration::factory()->create([
        'school_unit_id' => $schoolUnit->id,
        'registration_number' => 'REG-' . now()->format('Y') . '-0007',
        'status' => 'pending',
    ]);

    $response = $this->post(route('ppdb.store'), ppdbPayload());

    $response->assertSuccessful()
        ->assertJsonPath('data.registration_number', 'REG-' . now()->format('Y') . '-0008');

    $registration = PpdbRegistration::query()
        ->where('registration_number', 'REG-' . now()->format('Y') . '-0008')
        ->first();

    expect($registration)->not->toBeNull();
    expect($registration->family_card_path)->not->toBeNull();

    Storage::disk('public')->assertExists($registration->family_card_path);
});

it('rejects a registration when the selected unit quota is already full', function () {
    Storage::fake('public');
    ensureOptionalCmsTablesExist();

    $schoolUnit = SchoolUnit::factory()->create([
        'name' => 'TK Lahiza Sunnah',
        'slug' => 'tk-lahiza',
        'max_quota' => 1,
        'is_active' => true,
    ]);

    PpdbRegistration::factory()->pending()->create([
        'school_unit_id' => $schoolUnit->id,
        'registration_number' => 'REG-' . now()->format('Y') . '-0001',
    ]);

    $response = $this->post(route('ppdb.store'), ppdbPayload());

    $response->assertStatus(409)
        ->assertJsonPath('success', false);

    expect(PpdbRegistration::query()->count())->toBe(1);
});
