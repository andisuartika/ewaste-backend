<?php

namespace App\Http\Livewire;

use App\Models\Banner;
use Livewire\Component;

class BannerIndex extends Component
{
    protected $listeners = [
        'refreshComponent' => '$refresh'
    ];

    public function render()
    {
        $banners = Banner::orderBy('status', 'desc')->latest()->paginate(9);
        return view('livewire.banner-index',[
            'banners' => $banners
        ]);
    }

    public function status($id, $status){
        $banner = banner::find($id);
  
        $banner->status =! $status;

        $banner->save();

        $this->dispatchBrowserEvent('swal:modalStatus');
        $this->emit('refreshComponent');
    }
}
