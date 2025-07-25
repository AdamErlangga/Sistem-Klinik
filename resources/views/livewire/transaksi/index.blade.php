<div class="p-6 space-y-6">
    <h1 class="text-xl font-semibold text-white">Transaksi Pembayaran</h1>

    @if (session()->has('success'))
        <div class="bg-green-600 text-white p-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-gray-900 text-white rounded shadow">
            <thead class="bg-gray-700">
                <tr>
                    <th class="px-4 py-2 text-left">Nama Pasien</th>
                    <th class="px-4 py-2 text-left">Jenis Tindakan</th>
                    <th class="px-4 py-2 text-left">Harga</th>
                    <th class="px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($patients as $patient)
                    <tr class="border-t border-gray-600">
                        <td class="px-4 py-2">{{ $patient->name }}</td>
                        <td class="px-4 py-2">{{ $patient->hargaTindakan->name ?? '-' }}</td>
                        <td class="px-4 py-2">
                            Rp {{ number_format($patient->hargaTindakan->price ?? 0, 0, ',', '.') }}
                        </td>
                        <td class="px-4 py-2 text-center">
                            <button wire:click="bayar({{ $patient->id }})"
                                class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">
                                Bayar
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-gray-400">
                            Tidak ada pasien menunggu pembayaran.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
