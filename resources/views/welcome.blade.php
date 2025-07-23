<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Selamat Datang</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,600,700" rel="stylesheet" />

    <!-- TailwindCSS CDN (jika belum build CSS) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-gray-800 to-black text-white flex flex-col">
    <!-- Header -->
    <header class="flex justify-end p-6">
        <a href="{{ route('login') }}"
            class="px-5 py-2 border border-white text-white rounded-full hover:bg-white hover:text-gray-800 transition">
            Login
        </a>
    </header>

    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center">
        <div
            class=" p-10 max-w-xl w-full text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">Selamat Datang di Aplikasi Klinik</h1>
            <p class="text-lg md:text-xl text-white/80 mb-8">
                Sistem informasi klinik dengan fitur lengkap untuk pendaftaran pasien, tindakan medis, pembayaran, dan
                laporan.
            </p>
            <a href="{{ route('login') }}"
                class="inline-block px-6 py-3 bg-white text-gray-900 font-semibold rounded-lg shadow hover:bg-gray-200 transition">
                Masuk Sekarang
            </a>
        </div>
    </main>

    <!-- Footer -->
    <footer class="text-center p-4 text-white/60 text-sm">
        &copy; {{ date('Y') }} Aplikasi Klinik. All rights reserved.
    </footer>
</body>

</html>
