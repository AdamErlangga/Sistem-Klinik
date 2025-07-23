<?php

namespace App\Livewire\Patients;

use Livewire\Component;
use App\Models\Patient;
use App\Models\HargaTindakan;

class Index extends Component
{
    public $name, $region, $complaint, $visit_type;

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'complaint' => 'required|string',
            'visit_type' => 'required|integer|in:1,2,3',
        ]);



        Patient::create([
            'name' => $this->name,
            'region' => $this->region,
            'complaint' => $this->complaint,
            'visit_type' => (int) $this->visit_type,
            'handled_by_doctor' => false,
        ]);

        session()->flash('success', 'Data pasien berhasil disimpan.');

        // Reset form setelah simpan
        $this->reset(['name', 'region', 'complaint', 'visit_type']);
    }

    public function render()
    {
        return view('livewire.patients.index');
    }
}
