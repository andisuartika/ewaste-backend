<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Perjalanan;

class PerjalananCreate extends Component
{
    public $petugas;
    public $dateTime;
    public $keterangan;
    public $id_perjalanan;

    public $users;

    protected $listeners = [
        'refreshComponent' => '$refresh'
    ];


    public function render()
    {
        $this->users = User::where('roles','PETUGAS')->get();
        return view('livewire.perjalanan-create');
    }

    public function store()
    {
        
        // Mengambil kode terbesar
        $kodeMax = Perjalanan::max('kode');
        $result = substr($kodeMax, 1, 3);
        $result++;

        $kode = 'P' . sprintf("%03s", $result) . '-' . date("d-m") . '-' . date("Y");


        $this->validate([
            'petugas' => ['required'],
            'dateTime' => ['required'],
            'keterangan' => ['required']
        ]);

        $perjalanan =  Perjalanan::create([
            'kode' => $kode,
            'id_petugas' => $this->petugas,
            'waktuTugas' => $this->dateTime,
            'keterangan' => $this->keterangan,
        ]);

        $this->dispatchBrowserEvent('closeModal');
        $this->dispatchBrowserEvent('swal:modalCreate');

        $this->resetInput();
        $this->emit('refreshComponent');
    }

    public function showPerjalanan($perjalanan)
    {
        
        // $this->id_perjalanan = $perjalanan['id'];
        // $this->petugas = $perjalanan['id_petugas'];
        // $this->dateTime = $perjalanan['waktuTugas'];
        // $this->keterangan = $perjalanan['keterangan'];

    }

    
    public function resetInput()
    {
        $this->petugas= null;
        $this->dateTime = null;
        $this->keterangan = null;

    }
}