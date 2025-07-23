<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;

class Index extends Component
{
    public $name, $email, $password, $role_id;

    public $roles = [];
    public $users = [];

    public $editingUserId = null;
    public $selectedRoleId = null;
    public function createUser()
    {
        $this->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role_id' => 'required|exists:roles,id',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'role_id' => $this->role_id,
        ]);

        session()->flash('success', 'User berhasil ditambahkan.');

        $this->reset(['name', 'email', 'password', 'role_id']);
        $this->users = User::with('role')->get(); // refresh data
    }

    public function mount()
    {
        $this->roles = Role::all();
        $this->users = User::with('role')->get();
    }

    public function editRole($userId)
    {
        $this->editingUserId = $userId;
        $user = User::findOrFail($userId);
        $this->selectedRoleId = $user->role_id;
    }

    public function updateRole()
    {
        $user = User::findOrFail($this->editingUserId);
        $user->role_id = $this->selectedRoleId;
        $user->save();

        session()->flash('success', 'Role berhasil diperbarui.');

        $this->editingUserId = null;
        $this->selectedRoleId = null;
        $this->users = User::with('role')->get(); // refresh list user
    }
    public function deleteUser($id)
    {
        User::findOrFail($id)->delete();

        // Refresh data
        $this->users = User::with('role')->get();

        session()->flash('success', 'User berhasil dihapus.');
    }

    public function render()
    {
        return view('livewire.users.index', [
            'roles' => $this->roles,
            'users' => User::with('role')->get(),
        ]);
    }
}
