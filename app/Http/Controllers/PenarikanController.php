<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\TransaksiPoin;

class PenarikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksiPoin = TransaksiPoin::where('status', 'PENDING')->latest()->get();
        $transaksiPoinCount = TransaksiPoin::where('status', 'PENDING')->count();
        $allTransaksi = TransaksiPoin::where('status', 'BERHASIL')->orWhere('status', 'GAGAL')->latest()->get();
        $allTransaksiCount = TransaksiPoin::where('status', 'BERHASIL')->orWhere('status', 'GAGAL')->count();
        return view('pages.penarikan',compact('transaksiPoin','allTransaksi','transaksiPoinCount', 'allTransaksiCount'));
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
        $transaksi = TransaksiPoin::find($id);

        if($request->ditangguhkan){

            // JIKA TRANSAKSI DITANGGUHKAN
  
            $transaksi->status = 'GAGAL';
            $transaksi->keterangan = $request->keterangan;

            $transaksi->save();
        }else{
            // JIKA TRANSAKSI DIBERHASIL
  
            $transaksi->status = 'BERHASIL';
            $transaksi->keterangan = 'TRANSAKSI BERHASIL DILAKUKAN';

            $nasabah = User::find($transaksi->id_user);
            $total = $transaksi->jumlah + 2500;

            $nasabah->points -= $total;

            $nasabah->save();
            $transaksi->save();
        }

        // $transaksi->status = 'BERHASIL';

        return redirect(route('penarikan-saldo'));

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
