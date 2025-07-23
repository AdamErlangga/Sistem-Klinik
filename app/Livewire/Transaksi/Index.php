<?php

namespace App\Livewire\Transaksi;

use Livewire\Component;
use App\Models\Patient;

class Index extends Component
{
    public function bayar($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->is_paid = true;
        $patient->save();

        session()->flash('success', 'Transaksi berhasil dibayar.');
    }

    public function render()
    {
        $patients = Patient::with('hargaTindakan.visitType')
        ->where('is_paid', false)
        ->where('handled_by_doctor', true)
        ->get();

    return view('livewire.transaksi.index', compact('patients'));
    }
}
