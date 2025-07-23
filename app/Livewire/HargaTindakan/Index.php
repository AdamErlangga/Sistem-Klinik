<?php

namespace App\Livewire\HargaTindakan;

use Livewire\Component;
use App\Models\HargaTindakan;


class Index extends Component
{
    public $name, $price;

    public function create()
    {
        HargaTindakan::create([
            'name' => $this->name,
            'price' => $this->price,
        ]);

        $this->reset(['name', 'price']);
        session()->flash('success', 'Tindakan berhasil ditambahkan.');
    }
    public function delete($id)
    {
        $tindakan = HargaTindakan::findOrFail($id);
        $tindakan->delete();

        session()->flash('success', 'Tindakan berhasil dihapus.');
    }

    public function render()
    {
        return view('livewire.harga-tindakan.index', [
            'tindakans' => \App\Models\HargaTindakan::all(),
        ]);
    }
}
