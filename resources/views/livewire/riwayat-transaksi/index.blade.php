<div class="p-6 space-y-6">
    <h1 class="text-xl font-semibold text-white">Riwayat Transaksi</h1>
    @if (session()->has('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition
            class="bg-green-500 text-white p-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if ($riwayat->isEmpty())
        <div class="text-gray-400">Tidak ada riwayat transaksi yang ditemukan.</div>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-700 border border-gray-700 rounded-lg mt-4">
                <thead class="bg-gray-800 text-gray-300">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Nama Pasien</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Wilayah</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Keluhan</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Tindakan</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Harga</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Tanggal</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold"></th>
                    </tr>
                </thead>
                <tbody class="bg-gray-900 divide-y divide-gray-800 text-gray-200">
                    @foreach ($riwayat as $item)
                        <tr class="hover:bg-gray-800 transition duration-150">
                            <td class="px-6 py-4">{{ $item->name }}</td>
                            <td class="px-6 py-4">{{ $item->region }}</td>
                            <td class="px-6 py-4">{{ $item->complaint }}</td>
                            <td class="px-6 py-4">{{ $item->hargaTindakan->name ?? '-' }}</td>
                            <td class="px-6 py-4">Rp {{ number_format($item->hargaTindakan->price ?? 0) }}</td>
                            <td class="px-6 py-4">{{ $item->created_at->format('d-m-Y H:i') }}</td>
                            <td class="px-6 py-4">
                                @if (auth()->user()->role->name === 'admin')
                                    <button wire:click="edit({{ $item->id }})"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded cursor-pointer">
                                        Edit
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    {{-- Modal Edit --}}
    @if ($showEditModal && $editingTransaction)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
            <div class="bg-gray-800 rounded-lg p-6 w-full max-w-xl shadow-lg">
                <h2 class="text-lg font-semibold text-white mb-4">Edit Transaksi</h2>

                <form wire:submit.prevent="update">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm text-gray-300">Nama Pasien</label>
                            <input type="text" wire:model.defer="name"
                                class="w-full mt-1 px-4 py-2 rounded bg-gray-700 text-white border border-gray-600" />
                        </div>

                        <div>
                            <label class="block text-sm text-gray-300">Wilayah</label>
                            <input type="text" wire:model.defer="region"
                                class="w-full mt-1 px-4 py-2 rounded bg-gray-700 text-white border border-gray-600" />
                        </div>

                        <div>
                            <label class="block text-sm text-gray-300">Keluhan</label>
                            <textarea wire:model.defer="complaint"
                                class="w-full mt-1 px-4 py-2 rounded bg-gray-700 text-white border border-gray-600" rows="2"></textarea>
                        </div>

                        <div>
                            <label class="block text-sm text-gray-300">Tindakan & Harga</label>
                            <input type="text"
                                class="w-full mt-1 px-4 py-2 rounded bg-gray-700 text-white border border-gray-600"
                                value="{{ $editingTransaction->hargaTindakan->name ?? '-' }} - Rp {{ number_format($editingTransaction->hargaTindakan->price ?? 0) }}"
                                readonly />
                        </div>

                        <div>
                            <label class="block text-sm text-gray-300">Waktu Transaksi</label>
                            <input type="text"
                                class="w-full mt-1 px-4 py-2 rounded bg-gray-700 text-white border border-gray-600"
                                value="{{ $editingTransaction->created_at->format('d-m-Y H:i') }}" readonly />
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end space-x-2">
                        <button type="button" wire:click="$set('showEditModal', false)"
                            class="px-4 py-2 bg-gray-600 hover:bg-gray-500 text-white rounded cursor-pointer">Batal</button>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded cursor-pointer">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
