<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Construction Management')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100 text-slate-800">

    <nav class="bg-slate-900 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <h1 class="text-xl font-bold">
                Construction Project Management
            </h1>
            <p class="text-sm text-slate-300 mt-1">
                Sistem Manajemen Proyek Konstruksi
            </p>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6 py-8">
        @yield('content')
    </main>

    <footer class="text-center text-sm text-slate-500 py-6">
        © {{ date('Y') }} Construction Project Management
    </footer>

</body>
</html>