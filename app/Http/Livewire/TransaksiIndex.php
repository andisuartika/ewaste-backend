<?php

namespace App\Http\Livewire;

use App\Models\Perjalanan;
use App\Models\Transaksi;
use Livewire\Component;

class TransaksiIndex extends Component
{
    public function render()
    {
        $allTransaksi = Transaksi::where('status','BERHASIL')->orWhere('status','DITANGGUHKAN')->get();
        $perjalanans = Perjalanan::where('status', 'DIKERJAKAN')->get();
        return view('livewire.transaksi-index',[
            'allTransaksi' => $allTransaksi,
            'perjalanans' => $perjalanans,
        ]);
    }
}
