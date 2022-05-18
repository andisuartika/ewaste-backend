<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\Transaksi;

class PembayaranIndex extends Component
{

    public $id_user;
    public int $jumlah;

    public function render()
    {   
        $date = Carbon::now();

        $users = User::where('iurans', '>', 0)->get();
        return view('livewire.pembayaran-index',[
            'users' => $users,
        ]);
    }

}
