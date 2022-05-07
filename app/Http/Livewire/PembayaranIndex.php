<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class PembayaranIndex extends Component
{

    public $id_user;
    public int $jumlah;

    public function render()
    {   
        $users = User::where('iurans', '>', 0)->get();
        return view('livewire.pembayaran-index',[
            'users' => $users,
        ]);
    }

}
