<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    {{-- Navbar atau layout bagian atas lainnya bisa tetap di sini --}}

    @isset($header)
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4">
                {{ $header }}
            </div>
        </header>
    @endisset

    {{-- INI BAGIAN PALING PENTING --}}
    <main class="min-h-screen px-4 py-6">
        {{ $slot }}
    </main>

</body>
</html>
