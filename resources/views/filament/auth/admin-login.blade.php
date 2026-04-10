<style>
    .admin-login-shell {
        min-height: 100vh;
        border: 1px solid rgba(255, 255, 255, 0.72);
        border-radius: 32px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 24px 70px rgba(120, 53, 15, 0.10);
    }

    .admin-login-grid {
        display: grid;
        min-height: 100vh;
        grid-template-columns: minmax(0, 1.15fr) minmax(0, 0.85fr);
    }

    .admin-login-brand {
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 40px 48px;
        color: #fff;
        background:
            radial-gradient(circle at top left, rgba(245, 158, 11, 0.28), transparent 38%),
            radial-gradient(circle at bottom right, rgba(22, 163, 74, 0.22), transparent 32%),
            linear-gradient(135deg, #020617 0%, #0f172a 55%, #1e293b 100%);
    }

    .admin-login-brand::after {
        content: '';
        position: absolute;
        inset: 0 0 0 auto;
        width: 1px;
        background: rgba(255, 255, 255, 0.10);
    }

    .admin-login-content,
    .admin-login-footer {
        position: relative;
        z-index: 1;
    }

    .admin-login-pill {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 10px 16px;
        border-radius: 999px;
        border: 1px solid rgba(255, 255, 255, 0.15);
        background: rgba(255, 255, 255, 0.10);
        color: rgba(255, 255, 255, 0.92);
        font-size: 14px;
        font-weight: 600;
        backdrop-filter: blur(10px);
    }

    .admin-login-pill-dot,
    .admin-login-mobile-dot {
        width: 10px;
        height: 10px;
        border-radius: 999px;
        background: #fbbf24;
        flex: none;
    }

    .admin-login-kicker {
        margin: 42px 0 16px;
        color: rgba(252, 211, 77, 0.86);
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 0.34em;
        text-transform: uppercase;
    }

    .admin-login-title {
        max-width: 620px;
        margin: 0;
        font-size: clamp(2.4rem, 4vw, 4rem);
        line-height: 1.08;
        font-weight: 700;
        letter-spacing: -0.03em;
    }

    .admin-login-description {
        max-width: 700px;
        margin: 20px 0 0;
        color: #cbd5e1;
        font-size: 1.05rem;
        line-height: 1.85;
    }

    .admin-login-stats {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 16px;
        margin-top: 36px;
    }

    .admin-login-stat {
        padding: 22px;
        border-radius: 26px;
        border: 1px solid rgba(255, 255, 255, 0.10);
        background: rgba(255, 255, 255, 0.10);
        backdrop-filter: blur(10px);
    }

    .admin-login-stat-label {
        color: #cbd5e1;
        font-size: 14px;
    }

    .admin-login-stat-title {
        margin-top: 10px;
        color: #fff;
        font-size: 1.7rem;
        font-weight: 700;
    }

    .admin-login-stat-copy {
        margin-top: 10px;
        color: #cbd5e1;
        font-size: 14px;
        line-height: 1.7;
    }

    .admin-login-footer {
        display: grid;
        gap: 12px;
    }

    .admin-login-note {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 14px 16px;
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.10);
        background: rgba(255, 255, 255, 0.05);
        color: #cbd5e1;
        font-size: 14px;
        line-height: 1.6;
    }

    .admin-login-note-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border-radius: 999px;
        font-size: 13px;
        font-weight: 700;
        flex: none;
    }

    .admin-login-note-badge.is-green {
        background: rgba(16, 185, 129, 0.14);
        color: #86efac;
    }

    .admin-login-note-badge.is-amber {
        background: rgba(245, 158, 11, 0.15);
        color: #fcd34d;
    }

    .admin-login-panel {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 32px 24px;
        background:
            radial-gradient(circle at top, rgba(245, 158, 11, 0.12), transparent 34%),
            linear-gradient(180deg, #fffaf0 0%, #ffffff 45%, #f8fafc 100%);
    }

    .admin-login-panel-inner {
        width: 100%;
        max-width: 640px;
        position: relative;
        z-index: 1;
    }

    .admin-login-mobile {
        display: none;
        margin-bottom: 28px;
    }

    .admin-login-mobile-pill {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 10px 16px;
        border-radius: 999px;
        border: 1px solid #fde68a;
        background: #fffbeb;
        color: #92400e;
        font-size: 14px;
        font-weight: 600;
    }

    .admin-login-mobile-copy {
        margin-top: 18px;
    }

    .admin-login-mobile-copy h1 {
        margin: 0;
        color: #020617;
        font-size: 2rem;
        line-height: 1.15;
        letter-spacing: -0.03em;
    }

    .admin-login-mobile-copy p {
        margin: 14px 0 0;
        color: #475569;
        font-size: 14px;
        line-height: 1.75;
    }

    .admin-login-card {
        padding: 32px;
        border: 1px solid rgba(255, 255, 255, 0.84);
        border-radius: 32px;
        background: rgba(255, 255, 255, 0.92);
        box-shadow: 0 18px 48px rgba(15, 23, 42, 0.10);
        backdrop-filter: blur(12px);
    }

    .admin-login-card-kicker {
        color: #b45309;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 0.3em;
        text-transform: uppercase;
    }

    .admin-login-card h2 {
        margin: 10px 0 0;
        color: #020617;
        font-size: 2rem;
        line-height: 1.15;
        letter-spacing: -0.03em;
    }

    .admin-login-card p {
        margin: 12px 0 0;
        color: #475569;
        font-size: 14px;
        line-height: 1.75;
    }

    .admin-login-form {
        margin-top: 28px;
    }

    @media (max-width: 1024px) {
        .admin-login-grid {
            grid-template-columns: 1fr;
        }

        .admin-login-brand {
            display: none;
        }

        .admin-login-mobile {
            display: block;
        }
    }

    @media (max-width: 640px) {
        .admin-login-shell {
            border-radius: 0;
        }

        .admin-login-panel {
            padding: 20px 16px;
        }

        .admin-login-card {
            padding: 24px 20px;
            border-radius: 24px;
        }
    }
</style>

<x-filament-panels::page.simple>
<div class="admin-login-shell">
    <div class="admin-login-grid">
        <section class="admin-login-brand">
            <div class="admin-login-content">
                <div class="admin-login-pill">
                    <span class="admin-login-pill-dot"></span>
                    <span>Portal administrasi sekolah</span>
                </div>

                <p class="admin-login-kicker">Sekolah Lahiza Sunnah</p>
                <h1 class="admin-login-title">Kelola operasional sekolah dari satu panel yang rapi dan terkontrol.</h1>
                <p class="admin-login-description">
                    Akses terpusat untuk manajemen konten, data guru, unit sekolah, artikel, dokumentasi, dan proses PPDB.
                </p>

                <div class="admin-login-stats">
                    <div class="admin-login-stat">
                        <div class="admin-login-stat-label">Konten</div>
                        <div class="admin-login-stat-title">Artikel</div>
                        <div class="admin-login-stat-copy">Publikasi informasi sekolah tetap terjaga dan mudah diperbarui.</div>
                    </div>

                    <div class="admin-login-stat">
                        <div class="admin-login-stat-label">Operasional</div>
                        <div class="admin-login-stat-title">PPDB</div>
                        <div class="admin-login-stat-copy">Pemantauan pendaftar dan status administrasi dalam satu alur kerja.</div>
                    </div>

                    <div class="admin-login-stat">
                        <div class="admin-login-stat-label">Profil</div>
                        <div class="admin-login-stat-title">Unit</div>
                        <div class="admin-login-stat-copy">Data sekolah, guru, dan dokumentasi tersusun konsisten untuk tim admin.</div>
                    </div>
                </div>
            </div>

            <div class="admin-login-footer">
                <div class="admin-login-note">
                    <span class="admin-login-note-badge is-green">01</span>
                    <span>Akses hanya untuk pengguna yang memiliki otorisasi panel admin.</span>
                </div>

                <div class="admin-login-note">
                    <span class="admin-login-note-badge is-amber">02</span>
                    <span>Gunakan email admin yang terdaftar agar proses autentikasi berjalan tanpa hambatan.</span>
                </div>
            </div>
        </section>

        <section class="admin-login-panel">
            <div class="admin-login-panel-inner">
                <div class="admin-login-mobile">
                    <div class="admin-login-mobile-pill">
                        <span class="admin-login-mobile-dot"></span>
                        <span>Sekolah Lahiza Sunnah</span>
                    </div>

                    <div class="admin-login-mobile-copy">
                        <h1>{{ $this->getHeading() }}</h1>
                        <p>{{ $this->getSubheading() }}</p>
                    </div>
                </div>

                <div class="admin-login-card">
                    <div class="admin-login-card-kicker">Admin Login</div>
                    <h2>{{ $this->getHeading() }}</h2>
                    <p>{{ $this->getSubheading() }}</p>

                    <div class="admin-login-form">
                        {{ $this->content }}
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
</x-filament-panels::page.simple>
