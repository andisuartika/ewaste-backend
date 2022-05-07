<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class NasabahIndex extends Component
{
    public $nasabah;
    public $delete_id;

    protected $listeners = [
        'nasabahStored' => 'handleStored',
    ];

    public function render()
    {
        $this->nasabah = User::where('roles','NASABAH')->orWhere('roles','USER')->get();
        return view('livewire.nasabah-index');
    }

    public function edit($id)
    {
        $nasabah = User::findOrFail($id);
        $this->emit('getNasabah', $nasabah);

    }

    public function delete_id($id)
    {
        $this->delete_id = $id;
    }

    public function delete()
    {
        User::find($this->delete_id)->delete();
        $this->dispatchBrowserEvent('swal:modalDelete');
        return redirect(route('nasabah'));
    }

    public function handleStored($nasabah)
    {
        
    }

}
