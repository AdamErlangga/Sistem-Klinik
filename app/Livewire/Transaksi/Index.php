<?php

namespace App\Livewire\Transaksi;

use Livewire\Component;
use App\Models\Patient;

class Index extends Component
{
    public function bayar($id)
    {
        $patient = Patient::where('id', $id)
            ->where('is_paid', false)
            ->where('handled_by_doctor', true)
            ->first();

        if (!$patient) {
            session()->flash('error', 'Data pasien tidak valid atau sudah dibayar.');
            return;
        }

        $patient->update(['is_paid' => true]);

        session()->flash('success', 'Transaksi berhasil dibayar.');
    }

    public function render()
    {
        $patients = Patient::with('hargaTindakan')
            ->where('is_paid', false)
            ->where('handled_by_doctor', true)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('livewire.transaksi.index', compact('patients'));
    }
}
