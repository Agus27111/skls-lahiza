<?php

namespace App\Http\Controllers;

use App\Models\AboutPage;
use App\Models\SchoolUnit;
use App\Models\Teacher;
use App\Models\Article;
use App\Models\Announcement;
use App\Models\HeroSection;
use App\Models\PpdbRegistration;
use App\Models\PpdbPaymentSetting;
use App\Models\VideoDocumentation;
use App\Models\PhotoDocumentation;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    private const DESIRED_PPDB_FILE_LIMIT_KB = 5120;

    /**
     * Display the welcome/home page
     */
    public function index()
    {
        $heroSection = HeroSection::active()
            ->latest('updated_at')
            ->first();

        // Ambil semua unit sekolah yang aktif
        $schoolUnits = SchoolUnit::where('is_active', true)->get();

        // Ambil guru yang aktif (hanya untuk showcase, detail di halaman tentang)
        $teachers = Teacher::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->get();

        // Ambil artikel yang sudah dipublikasikan (max 2 untuk ditampilkan di home)
        $articles = Article::published()
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        // Ambil pengumuman yang aktif dan featured
        $announcements = Announcement::active()
            ->featured()
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        // Jika tidak ada featured announcements, ambil semua aktif
        if ($announcements->isEmpty()) {
            $announcements = Announcement::active()
                ->orderBy('published_at', 'desc')
                ->take(3)
                ->get();
        }

        // Ambil video dokumentasi yang aktif
        $videos = VideoDocumentation::active()
            ->ordered()
            ->get();

        // Ambil foto dokumentasi yang aktif (limit 4 untuk homepage)
        $photos = PhotoDocumentation::active()
            ->ordered()
            ->take(4)
            ->get();

        $ppdbUploadLimits = $this->getPpdbUploadLimits();
        $ppdbPaymentSetting = $this->getActivePpdbPaymentSetting();

        return view('welcome', [
            'heroSection' => $heroSection,
            'schoolUnits' => $schoolUnits,
            'teachers' => $teachers,
            'articles' => $articles,
            'announcements' => $announcements,
            'videos' => $videos,
            'photos' => $photos,
            'ppdbUploadLimits' => $ppdbUploadLimits,
            'ppdbPaymentSetting' => $ppdbPaymentSetting,
        ]);
    }

    /**
     * Display the about us page with school information and teachers
     */
    public function about()
    {
        $aboutPage = Schema::hasTable('about_pages')
            ? AboutPage::active()->latest('updated_at')->first()
            : null;

        // Ambil semua unit sekolah yang aktif
        $schoolUnits = SchoolUnit::where('is_active', true)->get();

        // Ambil semua guru yang aktif dengan relasi schoolUnit
        $teachers = Teacher::where('is_active', true)
            ->with('schoolUnit')
            ->get();

        return view('about', [
            'aboutPage' => $aboutPage,
            'schoolUnits' => $schoolUnits,
            'teachers' => $teachers,
        ]);
    }

    /**
     * Store PPDB Registration from form submission
     */
    public function storePpdbRegistration(Request $request)
    {
        $ppdbUploadLimits = $this->getPpdbUploadLimits();
        $ppdbPaymentSetting = $this->getActivePpdbPaymentSetting();
        $activeHeroSection = $this->getActiveHeroSection();

        if ($activeHeroSection && ! $activeHeroSection->is_ppdb_active) {
            return response()->json([
                'success' => false,
                'message' => 'Pendaftaran PPDB sedang tidak aktif saat ini.',
            ], 403);
        }

        // Validasi input
        $validator = Validator::make($request->all(), [
            'student_name' => 'required|string|max:255',
            'student_birth_date' => 'required|date',
            'school_unit_code' => 'required|string|in:TK,SD',
            'parent_name' => 'required|string|max:255',
            'parent_phone' => 'required|string|max:20',
            'parent_address' => 'required|string',
            'family_card_file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:' . $ppdbUploadLimits['per_file_kb'],
            'father_id_card_file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:' . $ppdbUploadLimits['per_file_kb'],
            'mother_id_card_file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:' . $ppdbUploadLimits['per_file_kb'],
            'birth_certificate_file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:' . $ppdbUploadLimits['per_file_kb'],
        ], [
            'family_card_file.max' => 'File KK maksimal ' . $ppdbUploadLimits['per_file_mb_label'] . ' MB.',
            'father_id_card_file.max' => 'File KTP ayah maksimal ' . $ppdbUploadLimits['per_file_mb_label'] . ' MB.',
            'mother_id_card_file.max' => 'File KTP ibu maksimal ' . $ppdbUploadLimits['per_file_mb_label'] . ' MB.',
            'birth_certificate_file.max' => 'File Akte Lahir maksimal ' . $ppdbUploadLimits['per_file_mb_label'] . ' MB.',
            'family_card_file.uploaded' => 'File KK gagal diupload. Pastikan ukuran file tidak melebihi ' . $ppdbUploadLimits['per_file_mb_label'] . ' MB.',
            'father_id_card_file.uploaded' => 'File KTP ayah gagal diupload. Pastikan ukuran file tidak melebihi ' . $ppdbUploadLimits['per_file_mb_label'] . ' MB.',
            'mother_id_card_file.uploaded' => 'File KTP ibu gagal diupload. Pastikan ukuran file tidak melebihi ' . $ppdbUploadLimits['per_file_mb_label'] . ' MB.',
            'birth_certificate_file.uploaded' => 'File Akte Lahir gagal diupload. Pastikan ukuran file tidak melebihi ' . $ppdbUploadLimits['per_file_mb_label'] . ' MB.',
        ], [
            'student_name' => 'nama anak',
            'student_birth_date' => 'tanggal lahir',
            'school_unit_code' => 'unit pendidikan',
            'parent_name' => 'nama orang tua / wali',
            'parent_phone' => 'nomor WhatsApp',
            'parent_address' => 'alamat domisili',
            'family_card_file' => 'file KK',
            'father_id_card_file' => 'file KTP ayah',
            'mother_id_card_file' => 'file KTP ibu',
            'birth_certificate_file' => 'file Akte Lahir',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $storedFiles = [];
        $registration = null;
        $schoolUnitName = null;

        try {
            ['registration_id' => $registrationId, 'school_unit_name' => $schoolUnitName] = DB::transaction(
                function () use ($request, $ppdbPaymentSetting) {
                    $schoolUnit = $this->resolveSchoolUnitForRegistration($request->string('school_unit_code')->toString());

                    if (! $schoolUnit) {
                        throw new \DomainException('school_unit_not_found');
                    }

                    if (! $this->schoolUnitHasAvailableQuota($schoolUnit)) {
                        throw new \DomainException('quota_full');
                    }

                    $registration = PpdbRegistration::create([
                        'registration_number' => $this->reserveRegistrationNumber((int) now()->format('Y')),
                        'school_unit_id' => $schoolUnit->id,
                        'student_name' => $request->student_name,
                        'student_birth_date' => $request->student_birth_date,
                        'parent_name' => $request->parent_name,
                        'parent_phone' => $request->parent_phone,
                        'parent_address' => $request->parent_address,
                        'parent_relationship' => 'Orang Tua',
                        'status' => 'pending',
                        'registration_fee' => $ppdbPaymentSetting?->registration_fee ?? 250000,
                        'fee_paid' => false,
                    ]);

                    return [
                        'registration_id' => $registration->id,
                        'school_unit_name' => $schoolUnit->name,
                    ];
                },
                5,
            );

            $registration = PpdbRegistration::query()->findOrFail($registrationId);

            $registration->forceFill([
                'family_card_path' => $this->storeRegistrationDocument(
                    $request->file('family_card_file'),
                    'kk',
                    $registration->registration_number,
                    $storedFiles,
                ),
                'father_id_card_path' => $this->storeRegistrationDocument(
                    $request->file('father_id_card_file'),
                    'ktp-ayah',
                    $registration->registration_number,
                    $storedFiles,
                ),
                'mother_id_card_path' => $this->storeRegistrationDocument(
                    $request->file('mother_id_card_file'),
                    'ktp-ibu',
                    $registration->registration_number,
                    $storedFiles,
                ),
                'birth_certificate_path' => $this->storeRegistrationDocument(
                    $request->file('birth_certificate_file'),
                    'akte-lahir',
                    $registration->registration_number,
                    $storedFiles,
                ),
            ])->save();

            return response()->json([
                'success' => true,
                'message' => 'Pendaftaran berhasil disimpan',
                'data' => [
                    'registration_number' => $registration->registration_number,
                    'student_name' => $registration->student_name,
                    'student_birth_date' => $registration->student_birth_date->format('Y-m-d'),
                    'school_unit' => $schoolUnitName,
                    'parent_name' => $registration->parent_name,
                    'parent_phone' => $registration->parent_phone,
                    'parent_address' => $registration->parent_address,
                    'registration_fee_formatted' => 'Rp ' . number_format((float) $registration->registration_fee, 0, ',', '.'),
                    'payment_bank_name' => $ppdbPaymentSetting?->bank_name,
                    'payment_account_number' => $ppdbPaymentSetting?->account_number,
                    'payment_account_holder_name' => $ppdbPaymentSetting?->account_holder_name,
                    'payment_notes' => $ppdbPaymentSetting?->payment_notes,
                ],
            ]);
        } catch (\DomainException $e) {
            return match ($e->getMessage()) {
                'school_unit_not_found' => response()->json([
                    'success' => false,
                    'message' => 'Unit sekolah tidak ditemukan. Pastikan unit TK atau SD tersedia di sistem.',
                ], 404),
                'quota_full' => response()->json([
                    'success' => false,
                    'message' => 'Kuota unit sekolah yang dipilih sudah penuh. Silakan pilih unit lain atau hubungi admin.',
                ], 409),
                default => response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan saat memproses pendaftaran.',
                ], 500),
            };
        } catch (\Throwable $e) {
            if ($registration?->exists) {
                $registration->delete();
            }

            foreach ($storedFiles as $path) {
                Storage::disk('public')->delete($path);
            }

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display all video documentation
     */
    public function documentation()
    {
        $videos = VideoDocumentation::active()
            ->ordered()
            ->get();

        $categories = VideoDocumentation::active()
            ->distinct()
            ->pluck('category')
            ->sort();

        // Get featured photos (limit to 6 for homepage preview)
        $photos = PhotoDocumentation::active()
            ->ordered()
            ->take(6)
            ->get();

        return view('documentation', [
            'videos' => $videos,
            'categories' => $categories,
            'photos' => $photos,
        ]);
    }

    /**
     * Display all photo documentation (Jejak Langkah di Alam)
     */
    public function jejackLangkah()
    {
        $photos = PhotoDocumentation::active()
            ->ordered()
            ->get();

        return view('jejack-langkah', [
            'photos' => $photos,
        ]);
    }

    private function storeRegistrationDocument(
        UploadedFile $file,
        string $documentName,
        string $registrationNumber,
        array &$storedFiles,
    ): string {
        $directory = 'ppdb-documents/' . str($registrationNumber)->lower()->replace('/', '-');
        $extension = strtolower($file->getClientOriginalExtension());
        $path = $file->storeAs($directory, "{$documentName}.{$extension}", 'public');

        $storedFiles[] = $path;

        return $path;
    }

    private function resolveSchoolUnitForRegistration(string $schoolUnitCode): ?SchoolUnit
    {
        $slug = Str::of($schoolUnitCode)->lower()->append('-lahiza')->toString();

        return SchoolUnit::query()
            ->where(function ($query) use ($slug, $schoolUnitCode) {
                $query->where('slug', $slug)
                    ->orWhere('name', 'like', '%' . $schoolUnitCode . '%');
            })
            ->where('is_active', true)
            ->lockForUpdate()
            ->first();
    }

    private function schoolUnitHasAvailableQuota(SchoolUnit $schoolUnit): bool
    {
        $currentRegistrationCount = PpdbRegistration::query()
            ->where('school_unit_id', $schoolUnit->id)
            ->where('status', '!=', 'rejected')
            ->count();

        return $currentRegistrationCount < $schoolUnit->max_quota;
    }

    private function reserveRegistrationNumber(int $year): string
    {
        $timestamp = now();
        $wasCreated = DB::table('ppdb_registration_sequences')->insertOrIgnore([
            'year' => $year,
            'current_number' => 0,
            'created_at' => $timestamp,
            'updated_at' => $timestamp,
        ]) === 1;

        $sequence = DB::table('ppdb_registration_sequences')
            ->where('year', $year)
            ->lockForUpdate()
            ->first();

        $currentNumber = (int) ($sequence->current_number ?? 0);

        if ($wasCreated) {
            $currentNumber = max($currentNumber, $this->getLastRegistrationNumberForYear($year));
        }

        $nextNumber = $currentNumber + 1;

        DB::table('ppdb_registration_sequences')
            ->where('year', $year)
            ->update([
                'current_number' => $nextNumber,
                'updated_at' => $timestamp,
            ]);

        return sprintf('REG-%04d-%04d', $year, $nextNumber);
    }

    private function getLastRegistrationNumberForYear(int $year): int
    {
        $latestRegistration = PpdbRegistration::query()
            ->where('registration_number', 'like', "REG-{$year}-%")
            ->latest('id')
            ->first();

        if (! $latestRegistration) {
            return 0;
        }

        return (int) substr($latestRegistration->registration_number, -4);
    }

    private function getPpdbUploadLimits(): array
    {
        $uploadMaxKb = $this->iniBytesToKilobytes((string) ini_get('upload_max_filesize'));
        $postMaxKb = $this->iniBytesToKilobytes((string) ini_get('post_max_size'));
        $perFileKb = min(self::DESIRED_PPDB_FILE_LIMIT_KB, $uploadMaxKb);

        return [
            'per_file_kb' => $perFileKb,
            'per_file_mb_label' => $this->kilobytesToMegabytesLabel($perFileKb),
            'total_post_kb' => $postMaxKb,
            'total_post_mb_label' => $this->kilobytesToMegabytesLabel($postMaxKb),
        ];
    }

    private function iniBytesToKilobytes(string $value): int
    {
        $value = trim($value);

        if ($value === '') {
            return 0;
        }

        $unit = strtolower(substr($value, -1));
        $number = (float) $value;
        $bytes = match ($unit) {
            'g' => $number * 1024 * 1024 * 1024,
            'm' => $number * 1024 * 1024,
            'k' => $number * 1024,
            default => (float) $value,
        };

        return (int) round($bytes / 1024);
    }

    private function kilobytesToMegabytesLabel(int $kilobytes): string
    {
        $megabytes = $kilobytes / 1024;

        if ((int) $megabytes === $megabytes) {
            return (string) (int) $megabytes;
        }

        return number_format($megabytes, 1, '.', '');
    }

    private function getActivePpdbPaymentSetting(): ?PpdbPaymentSetting
    {
        if (! Schema::hasTable('ppdb_payment_settings')) {
            return null;
        }

        try {
            return PpdbPaymentSetting::active()
                ->latest('updated_at')
                ->first();
        } catch (\Throwable) {
            return null;
        }
    }

    private function getActiveHeroSection(): ?HeroSection
    {
        if (! Schema::hasTable('hero_sections')) {
            return null;
        }

        try {
            return HeroSection::active()
                ->latest('updated_at')
                ->first();
        } catch (\Throwable) {
            return null;
        }
    }
}
