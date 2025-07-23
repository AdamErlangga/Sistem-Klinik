<?php

namespace App\Livewire\MedicalActions;

use Livewire\Component;
use App\Models\Patient;

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
        $this->visit_type = $patient->visit_type;
        $this->prescription = $patient->prescription;
    }
    // Simpan tindakan medis
    public function save()
    {
        $this->validate([
            'visit_type' => 'required|string',
            'prescription' => 'required|string',
        ]);

        $patient = Patient::findOrFail($this->selectedPatientId);

        $patient->update([
            'visit_type' => $this->visit_type,
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
            'patients' => Patient::where('handled_by_doctor', false)->get(),
        ]);
    }
}
