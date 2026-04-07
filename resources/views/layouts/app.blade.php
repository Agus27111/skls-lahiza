<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <title>@yield('title', 'Artikel - Sekolah Lahiza Sunnah')</title>
    @include('partials.head')
</head>

<body class="bg-gray-50 dark:bg-gray-900">
    @include('partials.navbar')
    @include('partials.whatsapp-button')

    <!-- Add padding to account for fixed navbar -->
    <div class="pt-20">
        @yield('content')
    </div>

    @include('partials.footer')

    <script>
        // Initialize Lucide icons
        lucide.createIcons();
    </script>
</body>

</html>
