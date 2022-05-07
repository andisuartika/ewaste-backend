<?php

namespace App\Http\Livewire;

use App\Models\User;
use EmptyIterator;
use Livewire\Component;
use Livewire\WithPagination;

class PetugasIndex extends Component
{
    use WithPagination;

    
    public $paginate = 10;
    public $search;

    public $idUser = '';
    public $roles;

    public $pengguna;
    public $nasabah;
    public $petugas;

    public $delete_id;

    protected $updateQueryString = ['search'];


    public function mount(){
        $this->search = request()->query('search', $this->search);
    }

    public function render()
    {
        $this->pengguna = User::where('roles','PENGGUNA')->get();
        $this->nasabah = User::where('roles','NASABAH')->get();
        $this->petugas = User::where('roles','PETUGAS')->get();

        $users = User::where('roles','PETUGAS')->orWhere('roles','ADMIN')->latest()->paginate($this->paginate);

        if( $this->search !== null){
            $users =User::where(function ($query) {
                $query->where('roles', '=', 'PETUGAS')
                      ->orWhere('roles', '=', 'ADMIN');
            })->where('name', 'like', '%' .$this->search. '%')->latest()->paginate($this->paginate);
        }

        return view('livewire.petugas-index',[
            'users' => $users,
        ]);

       
    }

    public function store()
    {
        $id = (int)$this->idUser;

        $this->validate([
            'idUser' => 'required',
            'roles' => 'required',
        ]);

        $user = User::find($id);
  
        $user->roles = $this->roles;

        $user->save();

        $this->dispatchBrowserEvent('closeModal');
        
        $this->dispatchBrowserEvent('swal:modalCreate');
        

        $this->resetInput();
        return redirect(route('petugas'));
    }

    public function resetInput()
    {
        $this->idUser = null;
        $this->roles = null;
    }

    public function delete_id($id)
    {
        $this->delete_id = $id;
    }

    public function delete()
    {
        $user = User::find($this->delete_id);
  
        $user->roles = 'NASABAH';

        $user->save();

        
        $this->dispatchBrowserEvent('swal:modalDelete');
        return redirect(route('petugas'));
    }

}
