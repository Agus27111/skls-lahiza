<?php

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\Login;
use Filament\Support\Enums\Width;
use Illuminate\Contracts\Support\Htmlable;

class AdminLogin extends Login
{
    protected string $view = 'filament.auth.admin-login';

    public function getTitle(): string | Htmlable
    {
        return 'Login Admin';
    }

    public function getHeading(): string | Htmlable | null
    {
        if (filled($this->userUndertakingMultiFactorAuthentication)) {
            return 'Verifikasi keamanan';
        }

        return 'Masuk ke panel admin';
    }

    public function getSubheading(): string | Htmlable | null
    {
        if (filled($this->userUndertakingMultiFactorAuthentication)) {
            return 'Selesaikan verifikasi tambahan untuk melanjutkan ke dashboard administrasi.';
        }

        return 'Kelola konten sekolah, data PPDB, dokumentasi, dan operasional admin dari satu panel terpusat.';
    }

    public function getMaxWidth(): Width | string | null
    {
        return Width::Full;
    }
}
