<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.tailwindcss.com"></script>
<link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Merriweather:wght@300;400;700&display=swap"
    rel="stylesheet">
<script src="https://unpkg.com/lucide@latest"></script>
@php
    $tokens = $designTokens ?? [
        'primary' => '#15803d',
        'secondary' => '#d97706',
        'font_sans' => "Inter, ui-sans-serif, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif",
        'space' => [
            'xs' => '0.25rem',
            'sm' => '0.5rem',
            'md' => '0.75rem',
            'lg' => '1rem',
            'xl' => '1.5rem',
            '2xl' => '2rem',
        ],
    ];
@endphp
<style>
    :root {
        --color-primary: {{ $tokens['primary'] }};
        --color-secondary: {{ $tokens['secondary'] }};
        --color-primary-light: color-mix(in srgb, var(--color-primary) 70%, white);

        --color-earth: #78350f;
        --color-sand: #fef3c7;
        --color-leaf: #f0fdf4;

        --font-sans: {{ $tokens['font_sans'] }};

        --space-xs: {{ $tokens['space']['xs'] }};
        --space-sm: {{ $tokens['space']['sm'] }};
        --space-md: {{ $tokens['space']['md'] }};
        --space-lg: {{ $tokens['space']['lg'] }};
        --space-xl: {{ $tokens['space']['xl'] }};
        --space-2xl: {{ $tokens['space']['2xl'] }};
    }

    body {
        font-family: var(--font-sans);
    }
</style>
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    primary: 'var(--color-primary)',
                    primaryLight: 'var(--color-primary-light)',
                    secondary: 'var(--color-secondary)',
                    earth: 'var(--color-earth)',
                    sand: 'var(--color-sand)',
                    leaf: 'var(--color-leaf)',
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
        background-color: var(--color-sand);
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23d97706' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
</style>
