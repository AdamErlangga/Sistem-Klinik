<div class="w-full flex justify-center items-start mt-10">
    <div class="w-full p-6 rounded-lg shadow">
        <h2 class="text-xl font-bold mb-6 text-white">Form Pendaftaran Pasien</h2>

        <!-- Flash message -->
        @if (session()->has('success'))
            <div class="bg-green-500 text-white p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form Input -->
        <form wire:submit="save" class="space-y-4">
            <div>
                <label for="name" class="block text-white">Nama Pasien</label>
                <input wire:model="name" id="name" type="text" class="w-full p-2 rounded bg-gray-800 text-white">
            </div>

            <div>
                <label for="region" class="block text-white">Wilayah</label>
                <input wire:model="region" id="region" type="text"
                    class="w-full p-2 rounded bg-gray-800 text-white">
            </div>

            <div>
                <label for="complaint" class="block text-white">Keluhan</label>
                <textarea wire:model="complaint" id="complaint" class="w-full p-2 rounded bg-gray-800 text-white"></textarea>
            </div>

            <div>
                <label for="visit_type" class="block text-white">Jenis Kunjungan</label>
                <select wire:model="visit_type" id="visit_type" class="w-full p-2 rounded bg-gray-800 text-white">
                    <option value="">-- Pilih Jenis Kunjungan --</option>
                    <option value="1">Umum</option>
                    <option value="2">Laboratorium</option>
                    <option value="3">Rujukan</option>
                </select>
            </div>

            <button type="submit"
                class="cursor-pointer mt-4 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Simpan
            </button>
        </form>
    </div>
</div>
