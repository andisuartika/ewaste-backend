<?php

namespace App\Http\Controllers;

use App\Models\Perjalanan;
use App\Models\Transaksi;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\TransaksiItems;

class DashboardController extends Controller
{
    public function index()
    {
        $date = Carbon::now();

        $nasabah = User::where('roles','=','NASABAH')->count();
        $petugas = User::where('roles','=','PETUGAS')->orWhere('roles','=','ADMIN')->count();
        $sampahMasuk = TransaksiItems::whereMonth('created_at',$date->month)->count('kuantitas');
        $sampahKeluar = 0;

        $latestTransaksi = Transaksi::with(['items'])->latest()->paginate('5');
        $tugasPerjalanan = Perjalanan::where('waktuTugas','>=', $date)->get();

        return view('pages.dashboard',compact(['nasabah','petugas','sampahMasuk', 'sampahKeluar','latestTransaksi','tugasPerjalanan']));
    }
    
}
