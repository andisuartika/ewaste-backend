<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Sampah;
use App\Models\Transaksi;
use App\Models\Perjalanan;
use Illuminate\Http\Request;
use App\Models\TransaksiItems;

class DashboardController extends Controller
{
    public function index()
    {
        $date = Carbon::now();

        $weekStartDate = $date->startOfWeek()->format('Y-m-d H:i');
        $weekEndDate = $date->endOfWeek()->format('Y-m-d H:i');

        $nasabah = User::where('roles','=','NASABAH')->count();
        $petugas = User::where('roles','=','PETUGAS')->orWhere('roles','=','ADMIN')->count();
        $sampahMasuk = TransaksiItems::whereMonth('created_at',$date->month)->sum('kuantitas');
        $sampahCount = TransaksiItems::where('sampah','!=',6)->whereMonth('created_at',$date->month)->sum('kuantitas');
        $trBulanIni = Transaksi::where('status','=','BERHASIL')->where('jenisTransaksi','=','TRANSAKSI MASUK')->whereMonth('created_at', $date->month)->sum('total');
        $trBulanLalu = Transaksi::where('status','=','BERHASIL')->where('jenisTransaksi','=','TRANSAKSI MASUK')->whereMonth('created_at', $date->month-1)->sum('total');
        $sampahKeluar = 0;
        $sampah = [
            [
                'name' => 'Organik', 
                'y' => TransaksiItems::where('sampah',1)->whereMonth('created_at',$date->month)->sum('kuantitas')
            ],
            [
                'name' => 'Plastik',
                'y' => TransaksiItems::where('sampah',2)->whereMonth('created_at',$date->month)->sum('kuantitas'),
            ],
            [
                'name' => 'Kertas',
                'y' => TransaksiItems::where('sampah',3)->whereMonth('created_at',$date->month)->sum('kuantitas')
            ],
            [
                'name'=>'Logam',
                'y' => TransaksiItems::where('sampah',4)->whereMonth('created_at',$date->month)->sum('kuantitas')
            ],
            [
                'name' => 'Kaca',
                'y' => TransaksiItems::where('sampah',5)->whereMonth('created_at',$date->month)->sum('kuantitas')
            ],
        ];

        $latestTransaksi = Transaksi::with(['items'])->latest()->paginate('5');
        $sampahMinggu = [
            [
                'sampah' => Sampah::where('id',1)->get(), 
                'value' => TransaksiItems::where('sampah',1)->whereBetween('created_at', [$weekStartDate, $weekEndDate])->sum('kuantitas')
            ],
            [
                'sampah' => Sampah::where('id',2)->get(),
                'value' => TransaksiItems::where('sampah',2)->whereBetween('created_at', [$weekStartDate, $weekEndDate])->sum('kuantitas'),
            ],
            [
                'sampah' => Sampah::where('id',3)->get(),
                'value' => TransaksiItems::where('sampah',3)->whereBetween('created_at', [$weekStartDate, $weekEndDate])->sum('kuantitas')
            ],
            [
                'sampah' => Sampah::where('id',4)->get(),
                'value' => TransaksiItems::where('sampah',4)->whereBetween('created_at', [$weekStartDate, $weekEndDate])->sum('kuantitas')
            ],
            [
                'sampah' => Sampah::where('id',5)->get(),
                'value' => TransaksiItems::where('sampah',5)->whereBetween('created_at', [$weekStartDate, $weekEndDate])->sum('kuantitas')
            ],
        ];


        return view('pages.dashboard',
                    compact([
                        'nasabah','petugas','sampahMasuk', 'sampahKeluar','latestTransaksi','trBulanIni','trBulanLalu','sampah','sampahMinggu','sampahCount'
                    ])
                );
    }
    
}
