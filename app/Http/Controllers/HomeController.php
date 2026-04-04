<?php

namespace App\Http\Controllers;

use App\Models\SchoolUnit;
use App\Models\Teacher;
use App\Models\Article;
use App\Models\Announcement;

class HomeController extends Controller
{
    /**
     * Display the welcome/home page
     */
    public function index()
    {
        // Ambil semua unit sekolah yang aktif
        $schoolUnits = SchoolUnit::where('is_active', true)->get();

        // Ambil semua guru yang aktif
        $teachers = Teacher::where('is_active', true)->get();

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

        return view('welcome', [
            'schoolUnits' => $schoolUnits,
            'teachers' => $teachers,
            'articles' => $articles,
            'announcements' => $announcements,
        ]);
    }
}
