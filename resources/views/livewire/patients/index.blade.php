<div class="w-full flex justify-center items-start mt-10">
    <div class="w-full p-6 rounded-lg shadow">
        <h2 class="text-xl font-bold mb-6 text-white">Form Pendaftaran Pasien</h2>

        <!-- Flash message -->
        @if (session()->has('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition
                class="bg-green-500 text-white p-2 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form Input -->
        <form wire:submit.prevent="save" class="space-y-4">
            <div>
                <label for="name" class="block text-white">Nama Pasien</label>
                <input wire:model="name" id="name" type="text"
                    class="w-full p-2 rounded bg-gray-800 text-white">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="region" class="block text-white">Wilayah</label>
                <input wire:model="region" id="region" type="text"
                    class="w-full p-2 rounded bg-gray-800 text-white">
                @error('region')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="complaint" class="block text-white">Keluhan</label>
                <textarea wire:model="complaint" id="complaint" class="w-full p-2 rounded bg-gray-800 text-white"></textarea>
                @error('complaint')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="harga_tindakan_id" class="block text-white">Jenis Kunjungan</label>
                <select wire:model="harga_tindakan_id" id="harga_tindakan_id"
                    class="w-full p-2 rounded bg-gray-800 text-white">
                    <option value="">-- Pilih Jenis Kunjungan --</option>
                    @foreach ($hargaTindakans as $tindakan)
                        <option value="{{ $tindakan->id }}">
                            {{ $tindakan->name }}
                        </option>
                    @endforeach
                </select>
                @error('harga_tindakan_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit"
                class="cursor-pointer mt-4 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Simpan
            </button>
        </form>
    </div>
</div>
