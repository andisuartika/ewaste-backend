<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class NasabahCreate extends Component
{
    public $name;
    public $kode;
    public $email;
    public $password;
    public $alamat;
    public $noHp;
    public $roles;
    public bool $isActive = false;
    public $id_nasabah;

    protected $listeners = [
        'getNasabah' => 'showNasabah'
    ];

    protected $messages = [
        'name.required' => 'Nama tidak boleh Kosong',
        'email.required' => 'Email tidak boleh Kosong',
        'alamat.required' => 'Alamat tidak boleh Kosong',
        'noHp.required' => 'No tidak boleh Kosong',
        'password.required' => 'Password tidak boleh Kosong',
        'email.unique' => 'Email sudah terdaftar',
        'noHp.unique' => 'No sudah terdaftar',
    ];


    public function store()
    {   
        // Mengambil kode terbesar
        $kodeMax = User::max('kode_nasabah');
        $result = substr($kodeMax, 4, 4);
        $result++;

        // GET USER
        $user = User::find($this->id_nasabah);

        

        if($this->id_nasabah == null){
            $this->validate([
                'name' => 'required',
                'password' => 'required',
                'email' => 'required|email|unique:users,email,'.$this->id_nasabah,
                'alamat' => 'required',
                'noHp' => 'required|unique:users,noHp,'.$this->id_nasabah,
            ]);
    
        }else{
            $this->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.$this->id_nasabah,
                'alamat' => 'required',
                'noHp' => 'required|unique:users,noHp,'.$this->id_nasabah,
            ]);
        }
        
        // CEK ROLE
        if($this->isActive){
            $this->roles = 'NASABAH';

            // ADD KODE NASABAH
            if($user->kode_nasabah == null){
                $this->kode = 'NEWB' . sprintf("%04s", $result) . '-' . sprintf("%04s", $this->id_nasabah) . '-' . date("dmy");
            }else{
                $this->kode = $user->kode_nasabah ;
            }

        }else{
            $this->roles = 'USER';
        }

        // dd($this->kode);



        if($this->id_nasabah == null){
            $nasabah = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'alamat' => $this->alamat,
                'noHp' => $this->noHp,
                'roles' => $this->roles,
            ]);
        }else{
            $nasabah = User::updateOrCreate(['id' => $this->id_nasabah], [
                'name' => $this->name,
                'kode_nasabah' => $this->kode,
                'email' => $this->email,
                'alamat' => $this->alamat,
                'noHp' => $this->noHp,
                'roles' => $this->roles,
            ]);
        }

        $this->emit('nasabahStored', $nasabah);
        $this->dispatchBrowserEvent('closeModal');
        if($this->id_nasabah == null){
            $this->dispatchBrowserEvent('swal:modalCreate');
        }else{
            $this->dispatchBrowserEvent('swal:modalUpdate');
        }

        $this->resetInput();
        // return redirect(route('nasabah'));
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
        if($nasabah['roles'] == 'USER') { 
            $this->isActive = false;
        }else{
            $this->isActive = true;
        }

    }


    public function resetInput()
    {
        $this->id_nasabah = null;
        $this->name = null;
        $this->email = null;
        $this->password = null;
        $this->alamat = null;
        $this->noHp = null;
    }
}
