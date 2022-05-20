<?php

namespace App\Http\Livewire;

use App\Models\Perjalanan;
use App\Models\User;
use Livewire\Component;

class PerjalananIndex extends Component
{
    public $petugas;
    public $nama_petugas;
    public $dateTime;
    public $keterangan;
    public $id_perjalanan;
    public $kode_perjalanan;
    public $delete_id;


    public $users;

    public function render()
    {
        $this->users = User::where('roles','PETUGAS')->get();
        $tasks = Perjalanan::all();
        return view('livewire.perjalanan-index',['tasks'=> $tasks]);
    }

    public function store()
    {
        
        // Mengambil kode terbesar
        $kodeMax = Perjalanan::max('kode');
        $result = substr($kodeMax, 1, 3);
        $result++;
        
        $kode = 'P' . sprintf("%03s", $result) . '-' . date("d-m") . '-' . date("Y");

        if($this->id_perjalanan != null){
            $kode = $this->kode_perjalanan;
        }


        $this->validate([
            'petugas' => ['required'],
            'dateTime' => ['required'],
            'keterangan' => ['required']
        ]);

        $perjalanan =  Perjalanan::updateOrCreate(['id' => $this->id_perjalanan],[
            'kode' => $kode,
            'id_petugas' => $this->petugas,
            'waktuTugas' => $this->dateTime,
            'keterangan' => $this->keterangan,
        ]);

        $this->dispatchBrowserEvent('closeModal');
        if($this->id_perjalanan == null){
            $this->dispatchBrowserEvent('swal:modalCreate');
        }else{
            $this->dispatchBrowserEvent('swal:modalUpdate');
        }

        $this->resetInput();
        // return redirect(route('tugas-perjalanan'));
    }

    public function delete_id($id)
    {
        $this->delete_id = $id;
    }

    public function delete()
    {
        Perjalanan::find($this->delete_id)->delete();
        $this->dispatchBrowserEvent('swal:modalDelete');
    }

    
    public function resetInput()
    {
        $this->petugas= null;
        $this->dateTime = null;
        $this->keterangan = null;
        $this->nama_petugas = null;
        $this->kode_perjalanan = null;
        $this->id_perjalanan = null;

    }

    public function edit($id)
    {
        $perjalanan = Perjalanan::find($id);

        $this->id_perjalanan = $perjalanan['id'];
        $this->petugas = $perjalanan['id_petugas'];
        $this->keterangan = $perjalanan['keterangan'];
        $this->kode_perjalanan = $perjalanan['kode'];

        $user = User::find($this->petugas);
        $this->nama_petugas = $user->name;

        $waktuTugas = $perjalanan['waktuTugas'];//sql timestamp
        $date = strtotime($waktuTugas);
        $this->dateTime = date('Y-m-d\TH:i', $date);

    }

}
