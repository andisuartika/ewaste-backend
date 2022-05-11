<?php

namespace App\Http\Livewire;

use App\Models\Banner;
use Livewire\Component;

class BannerIndex extends Component
{
    public function render()
    {
        $banners = Banner::orderBy('status', 'desc')->get();
        return view('livewire.banner-index',[
            'banners' => $banners
        ]);
    }

    public function status($id, $status){
        $banner = banner::find($id);
  
        $banner->status =! $status;

        $banner->save();

        $this->dispatchBrowserEvent('swal:modalStatus');

        return redirect(route('banner'));
    }
}
