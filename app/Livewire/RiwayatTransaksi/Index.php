<?php

namespace App\Livewire\RiwayatTransaksi;

use Livewire\Component;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $editingTransaction;
    public $showEditModal = false;

    public $name, $region, $complaint;

    public function render()
    {
        $riwayat = Patient::with('hargaTindakan')
            ->where('is_paid', true)
            ->where('handled_by_doctor', true)
            ->latest()
            ->get();

        return view('livewire.riwayat-transaksi.index', [
            'riwayat' => $riwayat,
        ]);
    }

    public function edit($id)
    {
        $this->editingTransaction = Patient::with('hargaTindakan')->findOrFail($id);

        // Isi field form
        $this->name = $this->editingTransaction->name;
        $this->region = $this->editingTransaction->region;
        $this->complaint = $this->editingTransaction->complaint;

        $this->showEditModal = true;
    }

    public function update()
    {
        if (Auth::user()->role->name !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $this->validate([
            'name' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'complaint' => 'nullable|string|max:500',
        ]);

        $this->editingTransaction->update([
            'name' => $this->name,
            'region' => $this->region,
            'complaint' => $this->complaint,
        ]);

        session()->flash('success', 'Data transaksi berhasil diperbarui.');
        $this->showEditModal = false;
    }
}
