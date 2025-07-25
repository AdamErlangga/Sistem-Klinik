<?php

namespace App\Livewire\Patients;

use Livewire\Component;
use App\Models\Patient;
use App\Models\HargaTindakan;

class Index extends Component
{
    public $name;
    public $region;
    public $complaint;
    public $harga_tindakan_id;

    public $hargaTindakans;

    public function mount()
    {
        // Ambil semua data harga tindakan beserta relasi visit type
        $this->hargaTindakans = HargaTindakan::all();
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'complaint' => 'required|string',
            'harga_tindakan_id' => 'required|exists:harga_tindakans,id',
        ]);

        // Ambil nama tindakan dari harga_tindakans
        $harga = HargaTindakan::findOrFail($this->harga_tindakan_id);

        Patient::create([
            'name' => $this->name,
            'region' => $this->region,
            'complaint' => $this->complaint,
            'visit_type' => $harga->name, // ← TAMBAHKAN INI
            'harga_tindakan_id' => $this->harga_tindakan_id,
            'handled_by_doctor' => false,
            'is_paid' => false,
        ]);

        session()->flash('success', 'Data pasien berhasil disimpan.');

        $this->reset(['name', 'region', 'complaint', 'harga_tindakan_id']);
    }

    public function render()
    {
        return view('livewire.patients.index', [
            'hargaTindakans' => $this->hargaTindakans,
        ]);
    }
}
