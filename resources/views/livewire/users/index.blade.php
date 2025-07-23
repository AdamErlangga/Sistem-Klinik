<div class="p-6 space-y-6">
    <h1 class="text-xl font-semibold text-white">Users Menu</h1>

    {{-- Flash Message --}}
    @if (session()->has('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition
            class="bg-green-500 text-white p-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form Tambah User --}}
    <div class="bg-gray-800 p-4 rounded-lg text-gray-200 space-y-4">
        <h2 class="text-lg font-semibold">Tambah User Baru</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input wire:model="name" type="text" placeholder="Nama"
                class="px-3 py-2 bg-gray-900 border border-gray-600 rounded" />
            <input wire:model="email" type="email" placeholder="Email"
                class="px-3 py-2 bg-gray-900 border border-gray-600 rounded" />
            <input wire:model="password" type="password" placeholder="Password"
                class="px-3 py-2 bg-gray-900 border border-gray-600 rounded" />
            <select wire:model="role_id" class="px-3 py-2 bg-gray-900 border border-gray-600 rounded">
                <option value="">-- Pilih Role --</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ Str::title(str_replace('_', ' ', $role->name)) }}</option>
                @endforeach
            </select>
        </div>

        <button wire:click="createUser"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 cursor-pointer">
            Tambah User
        </button>
    </div>

    {{-- Tabel Daftar User --}}
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-700 border border-gray-700 rounded-lg mt-6">
            <thead class="bg-gray-800 text-gray-300">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Nama</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Email</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Role</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold"></th>
                </tr>
            </thead>
            <tbody class="bg-gray-900 divide-y divide-gray-800 text-gray-200">
                @foreach ($users as $user)
                    <tr class="hover:bg-gray-800 transition duration-150">
                        <td class="px-6 py-4">{{ $user->name }}</td>
                        <td class="px-6 py-4">{{ $user->email }}</td>
                        <td class="px-6 py-4">
                            @if ($editingUserId === $user->id)
                                <select wire:model="selectedRoleId" class="bg-gray-800 text-white rounded px-2 py-1">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">
                                            {{ Str::title(str_replace('_', ' ', $role->name)) }}</option>
                                    @endforeach
                                </select>
                            @else
                                {{ Str::title(str_replace('_', ' ', $user->role->name ?? 'Tanpa Role')) }}
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            @if ($editingUserId === $user->id)
                                <button wire:click="updateRole"
                                    class="bg-green-600 text-white px-3 py-1 rounded mr-2 hover:bg-green-700 transition cursor-pointer">
                                    Simpan
                                </button>
                                <button wire:click="$set('editingUserId', null)"
                                    class="bg-gray-600 text-white px-3 py-1 rounded mr-2 hover:bg-gray-700 transition cursor-pointer">
                                    Batal
                                </button>
                            @else
                                <button wire:click="editRole({{ $user->id }})"
                                    class="bg-yellow-500 text-white px-3 py-1 rounded mr-2 hover:bg-yellow-600 transition cursor-pointer">
                                    Edit Role
                                </button>
                                <button wire:click="deleteUser({{ $user->id }})"
                                    onclick="confirm('Yakin ingin menghapus user ini?') || event.stopImmediatePropagation()"
                                    class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition cursor-pointer">
                                    Hapus
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
