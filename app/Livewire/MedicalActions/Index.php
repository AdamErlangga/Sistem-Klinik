<?php

namespace App\Livewire\MedicalActions;

use Livewire\Component;
use App\Models\Patient;
use App\Models\HargaTindakan;

class Index extends Component
{
    public $selectedPatientId = null;
    public $visit_type, $prescription;

    // Pilih pasien untuk ditindak
    public function selectPatient($id)
    {
        $patient = Patient::where('id', $id)
            ->where('handled_by_doctor', false)
            ->firstOrFail();

        $this->selectedPatientId = $patient->id;
        $this->visit_type = $patient->harga_tindakan_id;
        $this->prescription = $patient->prescription;
    }

    // Simpan tindakan medis
    public function save()
    {
        $this->validate([
            'visit_type' => 'required|integer|exists:harga_tindakans,id',
            'prescription' => 'required|string',
        ]);

        $patient = Patient::findOrFail($this->selectedPatientId);

        $patient->update([
            'harga_tindakan_id' => $this->visit_type,
            'prescription' => $this->prescription,
            'handled_by_doctor' => true,
        ]);

        session()->flash('success', 'Tindakan medis berhasil disimpan.');

        $this->resetForm();
    }

    protected function resetForm()
    {
        $this->reset(['selectedPatientId', 'visit_type', 'prescription']);
    }

    public function render()
    {
        return view('livewire.MedicalActions.index', [
            'patients' => Patient::where('handled_by_doctor', false)->with('hargaTindakan')->get(),
            'hargaTindakans' => HargaTindakan::all(),
        ]);
    }
}
