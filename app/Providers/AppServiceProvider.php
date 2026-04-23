<?php

namespace App\Providers;

use App\Models\HeroSection;
use App\Support\SchoolContext;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RateLimiter::for('ppdb', function (Request $request) {
            $phone = preg_replace('/\D+/', '', (string) $request->input('parent_phone'));
            $ipAddress = (string) $request->ip();

            return Limit::perMinute(20)->by($phone !== '' ? "{$phone}|{$ipAddress}" : $ipAddress);
        });

        View::composer('*', function ($view): void {
            $activeHeroSection = null;

            if (Schema::hasTable('hero_sections')) {
                try {
                    $activeHeroSection = HeroSection::active()->latest('updated_at')->first();
                } catch (\Throwable) {
                    $activeHeroSection = null;
                }
            }

            $view->with('activeHeroSection', $activeHeroSection);
            $view->with('currentSchool', SchoolContext::current());
            $view->with('designTokens', SchoolContext::tokens());
        });
    }
}
