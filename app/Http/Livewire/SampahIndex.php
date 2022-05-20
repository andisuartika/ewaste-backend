<?php

namespace App\Http\Livewire;

use App\Models\Sampah;
use Livewire\Component;
use Livewire\WithPagination;


class SampahIndex extends Component
{

    public $paginate;
    public $search;
    public $status;

    public $delete_id;

    protected $updateQueryString = ['search'];

    public function mount(){
        $this->search = request()->query('search', $this->search);
    }

    public function render()
    {
        $sampah = Sampah::latest()->paginate($this->paginate);

        if( $this->search !== null){
            $sampah =Sampah::where('nama', 'like', '%' .$this->search. '%')->latest()->paginate($this->paginate);
        }

        return view('livewire.sampah-index',['sampah'=> $sampah]);
    }

    public function status($id, $status){
        $sampah = Sampah::find($id);
  
        $sampah->status =! $status;

        $sampah->save();

        $this->dispatchBrowserEvent('swal:modalStatus');

        // return redirect(route('sampah'));
    }

    public function delete_id($id)
    {
        $this->delete_id = $id;
    }

    public function delete()
    {
  
        Sampah::find($this->delete_id)->delete();
        $this->dispatchBrowserEvent('swal:modalDelete');

    }
}
