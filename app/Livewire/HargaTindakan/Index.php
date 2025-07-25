<?php

namespace App\Livewire\HargaTindakan;

use Livewire\Component;
use App\Models\HargaTindakan;

class Index extends Component
{
    public $name, $price;
    public $parentTindakans = [];

    public function mount()
    {
        $this->loadParentTindakans();
    }

    public function loadParentTindakans()
    {
        $this->parentTindakans = HargaTindakan::whereNull('visit_type_id')->get();
    }

    public function create()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);


        $tindakan = HargaTindakan::create([
            'name' => $this->name,
            'price' => $this->price,
        ]);


        $tindakan->update([
            'visit_type_id' => $tindakan->id,
        ]);

        $this->reset(['name', 'price']);
        $this->loadParentTindakans();
        session()->flash('success', 'Tindakan berhasil ditambahkan.');
    }

    public function delete($id)
    {
        $tindakan = HargaTindakan::findOrFail($id);
        $tindakan->delete();

        $this->loadParentTindakans();
        session()->flash('success', 'Tindakan berhasil dihapus.');
    }

    public function render()
    {
        return view('livewire.harga-tindakan.index', [
            'tindakans' => HargaTindakan::all(),
        ]);
    }
}
