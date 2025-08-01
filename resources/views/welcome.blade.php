<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Selamat Datang</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex flex-col text-white font-inter bg-gradient-to-br from-gray-800 to-black scroll-smooth">


    <!-- Sticky Header berisi Navbar -->
    <header id="stickyLogin"
        class="fixed top-0 left-0 w-full z-50 transition-all duration-500 transform -translate-y-full opacity-0 pointer-events-none">

        <nav
            class="bg-white/80 dark:bg-neutral-900/80 backdrop-blur-md shadow-md px-6 py-3 flex justify-between items-center text-gray-800 dark:text-white">
            <div class="text-xl font-bold tracking-tight">
                Aplikasi Klinik
            </div>
            <a href="{{ route('login') }}"
                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-full shadow transition duration-300">
                Login
            </a>
        </nav>
    </header>


    <!-- Hero Section -->
    <section id="hero" class="h-screen flex items-center justify-center text-center px-6">
        <div class="max-w-2xl">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">Selamat Datang di Aplikasi Klinik</h1>
            <p class="text-lg md:text-xl text-white/80 mb-8">
                Sistem informasi klinik dengan fitur lengkap untuk pendaftaran pasien, tindakan medis, pembayaran, dan
                laporan.
            </p>
            <a id="mainLoginBtn" href="{{ route('login') }}"
                class="inline-block px-6 py-3 bg-white text-gray-900 font-semibold rounded-lg shadow hover:bg-gray-200 transition">
                Masuk Sekarang
            </a>
        </div>
    </section>

    <!-- Tentang Kami -->
    <section class="min-h-screen flex items-center bg-white px-4">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">

            {{-- Company Logo --}}
            <div class="flex justify-center items-center">
                <div class="w-40 h-40 bg-white rounded-full overflow-hidden flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" class="w-24 h-24 text-gray-900"
                        fill="currentColor">
                        <path fill="#000000" d="M36 20h-8v8h-8v8h8v8h8v-8h8v-8h-8v-8z" />
                        <path fill="#000000"
                            d="M32 4C17.641 4 6 15.641 6 30s11.641 26 26 26 26-11.641 26-26S46.359 4 32 4zm0 48c-12.131 0-22-9.869-22-22S19.869 8 32 8s22 9.869 22 22-9.869 22-22 22z" />
                    </svg>
                </div>
            </div>

            {{-- <Teks --}}
            <div class="flex flex-col justify-center">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Tentang Kami</h2>
                <p class="text-gray-700 text-lg mb-2">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis quo, quis nesciunt totam et
                    aperiam, nobis quam ad soluta, iusto quibusdam nisi recusandae mollitia repudiandae atque autem
                    facilis! Culpa, earum.
                </p>
                <p class="text-gray-600">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus itaque temporibus, exercitationem
                    magni perferendis ut est ullam, officia vel, ex similique. Odit ea vel temporibus vitae aperiam ipsa
                    dolores nemo.
                </p>
            </div>
        </div>
    </section>

    <footer class="bg-gray-900 text-center p-4 text-white/60 text-sm">
        &copy; {{ date('Y') }} Aplikasi Klinik. All rights reserved.
    </footer>
</body>

</html>
