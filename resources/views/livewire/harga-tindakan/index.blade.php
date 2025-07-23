<div class="p-6 space-y-6">
    <h1 class="text-xl font-semibold text-white">Daftar Harga Tindakan</h1>

    {{-- Flash Message --}}
    @if (session()->has('success'))
        <div class="bg-green-500 text-white p-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form Tambah Tindakan --}}
    <div class="bg-gray-800 p-4 rounded-lg text-gray-200 space-y-4">
        <h2 class="text-lg font-semibold">Tambah Tindakan</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input wire:model="name" type="text" placeholder="Nama Tindakan"
                class="px-3 py-2 bg-gray-900 border border-gray-600 rounded" />
            <input wire:model="price" type="number" placeholder="Harga"
                class="px-3 py-2 bg-gray-900 border border-gray-600 rounded" />
        </div>

        <button wire:click="create" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 cursor-pointer">
            Tambah
        </button>
    </div>

    {{-- Tabel Harga Tindakan --}}
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-700 border border-gray-700 rounded-lg mt-6">
            <thead class="bg-gray-800 text-gray-300">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Nama Tindakan</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Harga</th>
                    <th class="px-6 py-3 text-sm font-semibold"></th>
                </tr>
            </thead>
            <tbody class="bg-gray-900 divide-y divide-gray-800 text-gray-200">
                @foreach ($tindakans as $t)
                    <tr class="hover:bg-gray-800 transition duration-150">
                        <td class="px-6 py-4">{{ $t->name }}</td>
                        <td class="px-6 py-4">{{ number_format($t->price) }}</td>
                        <td class="px-6 py-4 text-right">
                            <button wire:click="delete({{ $t->id }})"
                                onclick="confirm('Yakin ingin menghapus tindakan ini?') || event.stopImmediatePropagation()"
                                class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition duration-200 cursor-pointer">
                                Hapus
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
