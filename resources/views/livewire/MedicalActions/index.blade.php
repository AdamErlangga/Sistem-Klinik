<div class="text-white">
    <h2 class="text-xl font-bold mb-4">Pasien Belum Ditangani</h2>

    @if (session()->has('success'))
        <div 
            x-data="{ show: true }" 
            x-init="setTimeout(() => show = false, 3000)" 
            x-show="show"
            class="bg-green-500 text-white p-3 rounded mb-4 transition-all duration-500"
        >
            {{ session('success') }}
        </div>
    @endif

    <ul class="space-y-3 mb-6">
        @foreach ($patients as $patient)
            <li class="bg-gray-700 p-4 rounded">
                <div class="flex justify-between items-center">
                    <div>
                        <strong>{{ $patient->name }}</strong> ({{ $patient->visit_type }})<br>
                        <small class="text-gray-300">Keluhan: {{ $patient->complaint }}</small>
                    </div>
                    <button wire:click="selectPatient({{ $patient->id }})"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded cursor-pointer">
                        Tindak
                    </button>
                </div>

                @if ($selectedPatientId === $patient->id)
                    <div class="bg-gray-800 p-4 mt-4 rounded">
                        <h3 class="text-lg font-semibold mb-3">Form Tindakan Medis</h3>

                        <form wire:submit.prevent="save" class="space-y-4">
                            <div>
                                <label class="block mb-1">Jenis Kunjungan</label>
                                <select wire:model="visit_type" class="w-full bg-gray-900 text-white p-2 rounded">
                                    <option value="">-- Pilih Jenis Kunjungan --</option>
                                    <option value="umum">Umum</option>
                                    <option value="laboratorium">Laboratorium</option>
                                    <option value="rujukan">Rujukan</option>
                                </select>
                                @error('visit_type') 
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="block mb-1">Resep</label>
                                <textarea wire:model="prescription" class="w-full bg-gray-900 text-white p-2 rounded"></textarea>
                                @error('prescription') 
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded text-white cursor-pointer">
                                Simpan Tindakan
                            </button>
                        </form>
                    </div>
                @endif
            </li>
        @endforeach
    </ul>
</div>
