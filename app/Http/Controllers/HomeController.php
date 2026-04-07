<?php

namespace App\Http\Controllers;

use App\Models\SchoolUnit;
use App\Models\Teacher;
use App\Models\Article;
use App\Models\Announcement;
use App\Models\HeroSection;
use App\Models\PpdbRegistration;
use App\Models\VideoDocumentation;
use App\Models\PhotoDocumentation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
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
            ->take(2)
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

        return view('welcome', [
            'heroSection' => $heroSection,
            'schoolUnits' => $schoolUnits,
            'teachers' => $teachers,
            'articles' => $articles,
            'announcements' => $announcements,
            'videos' => $videos,
            'photos' => $photos,
        ]);
    }

    /**
     * Display the about us page with school information and teachers
     */
    public function about()
    {
        // Ambil semua unit sekolah yang aktif
        $schoolUnits = SchoolUnit::where('is_active', true)->get();

        // Ambil semua guru yang aktif dengan relasi schoolUnit
        $teachers = Teacher::where('is_active', true)
            ->with('schoolUnit')
            ->get();

        return view('about', [
            'schoolUnits' => $schoolUnits,
            'teachers' => $teachers,
        ]);
    }

    /**
     * Store PPDB Registration from form submission
     */
    public function storePpdbRegistration(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'student_name' => 'required|string|max:255',
            'student_birth_date' => 'required|date',
            'school_unit_code' => 'required|string|in:TK,SD',
            'parent_name' => 'required|string|max:255',
            'parent_phone' => 'required|string|max:20',
            'parent_address' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            // Tentukan school_unit_id berdasarkan kode unit
            // Cari berdasarkan slug untuk lebih robust
            $schoolUnit = SchoolUnit::where('slug', strtolower($request->school_unit_code) . '-lahiza')
                ->orWhere('name', 'like', '%' . $request->school_unit_code . '%')
                ->where('is_active', true)
                ->first();

            if (!$schoolUnit) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unit sekolah tidak ditemukan. Pastikan unit TK atau SD tersedia di sistem.',
                ], 404);
            }

            // Buat nomor registrasi: REG-YYYY-XXXX
            $year = date('Y');
            $latestRegistration = PpdbRegistration::where('registration_number', 'like', "REG-{$year}-%")
                ->orderBy('id', 'desc')
                ->first();

            $nextNumber = 1;
            if ($latestRegistration) {
                $lastNumber = (int) substr($latestRegistration->registration_number, -4);
                $nextNumber = $lastNumber + 1;
            }

            $registrationNumber = sprintf('REG-%04d-%04d', $year, $nextNumber);

            // Simpan ke database
            $registration = PpdbRegistration::create([
                'registration_number' => $registrationNumber,
                'school_unit_id' => $schoolUnit->id,
                'student_name' => $request->student_name,
                'student_birth_date' => $request->student_birth_date,
                'parent_name' => $request->parent_name,
                'parent_phone' => $request->parent_phone,
                'parent_address' => $request->parent_address,
                'parent_relationship' => 'Orang Tua', // Default value
                'status' => 'pending',
                'fee_paid' => false,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Pendaftaran berhasil disimpan',
                'data' => [
                    'registration_number' => $registration->registration_number,
                    'student_name' => $registration->student_name,
                    'student_birth_date' => $registration->student_birth_date->format('Y-m-d'),
                    'school_unit' => $schoolUnit->name,
                    'parent_name' => $registration->parent_name,
                    'parent_phone' => $registration->parent_phone,
                    'parent_address' => $registration->parent_address,
                ],
            ]);
        } catch (\Exception $e) {
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
}
