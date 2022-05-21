<?php

namespace App\Http\Livewire;

use App\Models\Artikel;
use Livewire\Component;

class ArtikelIndex extends Component
{   
    protected $listeners = [
        'refreshComponent' => '$refresh'
    ];

    public $delete_id;

    public function render()
    {
        $artikels = Artikel::orderBy('status', 'desc')->latest()->paginate(10);
        return view('livewire.artikel-index',[
            'artikels' => $artikels,
        ]);
    }

    public function status($id, $status)
    {
        $artikel = Artikel::find($id);
        
        $artikel->status =! $status;
        $artikel->save();

        $this->dispatchBrowserEvent('swal:modalStatus');
        $this->emit('refreshComponent');

    }

    public function delete_id($id)
    {
        $this->delete_id = $id;
    }

    public function delete()
    {
        Artikel::find($this->delete_id)->delete();
        $this->dispatchBrowserEvent('swal:modalDelete');
        $this->emit('refreshComponent');
    }
}
