<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\TransaksiItems;
use Illuminate\Support\Facades\DB;

class GrapikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // CHART SAMPAH CAMPURAN TERPILAH
        $sampahCampuran = TransaksiItems::where('sampah',6)->sum('kuantitas');
        $sampahTerpilah= TransaksiItems::where('sampah','!=',6)->sum('kuantitas');


        // CHART TABUNGAN IURANS
        $tabungan = Transaksi::select(DB::raw("SUM(total) as total"))
                    ->where('jenisTransaksi','=', 'TRANSAKSI MASUK')
                    ->whereYear('created_at',date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('total');
        $monthTabungan = Transaksi::select(DB::raw("Month(created_at) as month"))
                        ->where('jenisTransaksi','=', 'TRANSAKSI MASUK')
                        ->whereYear('created_at',date('Y'))
                        ->groupBy(DB::raw("Month(created_at)"))
                        ->pluck('month');

        $dataTabungan=array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach($monthTabungan as $index=>$month)
        {
            $dataTabungan[$month-1] = $tabungan[$index];
        }

        $iurans = Transaksi::select(DB::raw("SUM(total) as total"))
                    ->where('jenisTransaksi','=', 'TRANSAKSI IURANS')
                    ->where('status','=', 'BERHASIL')
                    ->whereYear('created_at',date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('total');
        $monthIurans = Transaksi::select(DB::raw("Month(created_at) as month"))
                        ->where('status','=', 'BERHASIL')
                        ->where('jenisTransaksi','=', 'TRANSAKSI IURANS')
                        ->whereYear('created_at',date('Y'))
                        ->groupBy(DB::raw("Month(created_at)"))
                        ->pluck('month');

        $dataIurans=array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach($monthIurans as $index=>$month)
        {
            $dataIurans[$month-1] = $iurans[$index];
        }


        // CHART USER
        $users= User::select(DB::raw("COUNT(*) as count"))
                ->whereYear('created_at',date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('count');
        $monthUsers=User::select(DB::raw("Month(created_at) as month"))
                ->whereYear('created_at',date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('month');

        $dataUsers=array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach($monthUsers as $index=>$month)
        {
            $dataUsers[$month-1] = $users[$index];
        }


        // CHART SAMPAH
        $sampah= TransaksiItems::select(DB::raw("SUM(kuantitas) as kuantitas"))
                ->where('sampah','!=',6)
                ->groupBy(DB::raw("sampah"))
                ->pluck('kuantitas');

        // dd($dataIurans);
                       
        return view('pages.grapik-laporan',compact(['sampahCampuran','sampahTerpilah','dataTabungan','dataIurans','dataUsers','sampah']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
