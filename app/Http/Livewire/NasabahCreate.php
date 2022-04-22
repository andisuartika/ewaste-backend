<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class NasabahCreate extends Component
{
    public $name;
    public $email ;
    public $password ;
    public $alamat ;
    public $noHp;
    public $id_nasabah;

    protected $listeners = [
        'getNasabah' => 'showNasabah'
    ];

    protected $messages = [
        'name.required' => 'Nama tidak boleh Kosong',
        'email.required' => 'Email tidak boleh Kosong',
        'alamat.required' => 'alamat tidak boleh Kosong',
        'noHp.required' => 'No tidak boleh Kosong',
        'password.required' => 'Password tidak boleh Kosong',

        'email.unique' => 'Email sudah terdaftar',
        'noHp.unique' => 'No sudah terdaftar',
    ];


    public function store()
    {
        
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'noHp' => 'required',
        ]);


        $nasabah = User::updateOrCreate(['id' => $this->id_nasabah], [
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'alamat' => $this->alamat,
            'noHp' => $this->noHp,
        ]);


        $this->emit('nasabahStored', $nasabah);
        $this->dispatchBrowserEvent('closeModal');
        $this->dispatchBrowserEvent('swal:modalSuccess');
        $this->resetInput();
    }

    public function render()
    {
        return view('livewire.nasabah-create');
    }

    public function showNasabah($nasabah)
    {
        $this->name = $nasabah['name'];
        $this->email = $nasabah['email'];
        $this->alamat = $nasabah['alamat'];
        $this->noHp = $nasabah['noHp'];
        $this->id_nasabah = $nasabah['id'];

    }


    public function resetInput()
    {
        $this->id_nasabah = null;
        $this->name = null;
        $this->email = null;
        $this->password = null;
        $this->alamat = null;
        $this->nohp = null;
    }
}
