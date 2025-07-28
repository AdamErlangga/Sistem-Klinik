<x-layouts.app :title="__('Dashboard')">
    <div class="flex flex-col gap-6">

        <!-- Header -->
        <div>
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Selamat Datang</h1>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Anda login sebagai
                <span class="font-medium text-blue-600 dark:text-blue-400">{{ Auth::user()->role->name }}</span>.
            </p>
        </div>

        <!-- Informasi Aplikasi -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div
                class="bg-white dark:bg-neutral-800 border border-neutral-200 dark:border-neutral-700 shadow rounded-xl p-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Tentang Aplikasi</h2>
                <p class="text-sm text-gray-700 dark:text-gray-300">
                    Ini adalah sistem informasi klinik terpadu yang membantu proses pendaftaran pasien, tindakan medis,
                    pembayaran, dan pelaporan. Anda saat ini menggunakan sistem sebagai
                    <strong>{{ Auth::user()->role->name }}</strong>.
                </p>
            </div>

            <div
                class="bg-white dark:bg-neutral-800 border border-neutral-200 dark:border-neutral-700 shadow rounded-xl p-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Fitur Utama</h2>
                <ul class="list-disc text-sm text-gray-700 dark:text-gray-300 ml-5 space-y-1">
                    <li>Pendaftaran dan manajemen pasien</li>
                    <li>Tindakan dan diagnosa medis</li>
                    <li>Pencatatan pembayaran</li>
                    <li>Laporan dan statistik penggunaan</li>
                </ul>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Pasien Hari Ini -->
            <div
                class="bg-white dark:bg-neutral-800 border border-neutral-200 dark:border-neutral-700 shadow rounded-xl p-6">
                <h2 class="text-lg font-semibold text-white mb-2">Pasien Hari Ini</h2>
                <p class="text-4xl font-bold text-green-400">{{ $pasienHariIni }}</p>
            </div>

            <!-- Total Pasien -->
            <div
                class="bg-white dark:bg-neutral-800 border border-neutral-200 dark:border-neutral-700 shadow rounded-xl p-6">
                <h2 class="text-lg font-semibold text-white mb-2">Total Pasien</h2>
                <p class="text-4xl font-bold text-blue-400">{{ $totalPasien }}</p>
            </div>
        </div>

        <!-- Placeholder Grafik -->
        <div
            class="relative h-64 rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 shadow overflow-hidden">
            <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/10 dark:stroke-neutral-100/10" />
            <div class="relative z-10 flex items-center justify-center h-full text-gray-400 dark:text-gray-500 text-sm">
                Grafik atau Aktivitas Terakhir (Coming Soon)
            </div>
        </div>

    </div>
</x-layouts.app>
