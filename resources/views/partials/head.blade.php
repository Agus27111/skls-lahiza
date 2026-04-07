<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.tailwindcss.com"></script>
<link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Merriweather:wght@300;400;700&display=swap"
    rel="stylesheet">
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    primary: '#15803d',
                    /* Hijau Daun (Green 700) */
                    primaryLight: '#22c55e',
                    /* Hijau Muda (Green 500) */
                    secondary: '#d97706',
                    /* Kuning Hangat (Amber 600) */
                    earth: '#78350f',
                    /* Cokelat Tanah (Amber 900) */
                    sand: '#fef3c7',
                    /* Pasir/Krem (Amber 50) */
                    leaf: '#f0fdf4',
                    /* Hijau Sangat Pudar (Green 50) */
                },
                fontFamily: {
                    sans: ['Inter', 'sans-serif'],
                    serif: ['Merriweather', 'serif'],
                }
            }
        }
    }
</script>
<style>
    .hero-pattern {
        background-color: #fef3c7;
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23d97706' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
</style>
