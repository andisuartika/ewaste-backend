<?php

namespace App\Http\Controllers;

use App\Models\Perjalanan;
use App\Models\Transaksi;
use App\Models\TransaksiItems;
use App\Models\User;
use Illuminate\Http\Request;

class ValidasiTabunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.validasi');
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
        $perjalanan = Perjalanan::find($id);
        $kode = $perjalanan->kode;
        $transaksiMasuk = Transaksi::with(['items'])->where('id_perjalanan', $id)->where('jenisTransaksi', 'TRANSAKSI MASUK')->get();
        $transaksiIurans = Transaksi::with(['items'])->where('id_perjalanan', $id)->where('jenisTransaksi', 'TRANSAKSI IURANS')->get();

        $totalMasuk = Transaksi::where('id_perjalanan', $id)->where('jenisTransaksi', 'TRANSAKSI MASUK')->sum('total');
        $totalIurans = Transaksi::where('id_perjalanan', $id)->where('jenisTransaksi', 'TRANSAKSI IURANS')->sum('total');
        // echo($transaksiIurans); 
        return view('pages.validasiDetail',compact(['perjalanan', 'kode','transaksiMasuk','transaksiIurans','totalMasuk', 'totalIurans']));
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
        if($request->ditangguhkan){

            // JIKA TRANSAKSI DITANGGUHKAN

            $perjalanan = Perjalanan::find($id);
  
            $perjalanan->status = $request->ditangguhkan;

            $allTransaksi = Transaksi::where('id_perjalanan', $id)->get();

            foreach($allTransaksi as $tr){

                // UBAH STATUS TRANSAKSI
                $tr->status = $request->ditangguhkan;
                $tr->keterangan = $request->keterangan;

                $tr->save();
            }

            // dd($transaksi);

            $perjalanan->save();
        }else{

            // JIKA TRANSAKSI DITERIMA

            $perjalanan = Perjalanan::find($id);
  
            $perjalanan->status = 'SELESAI';

            $allTransaksi = Transaksi::where('id_perjalanan', $id)->get();

            foreach($allTransaksi as $tr){

                // UBAH STATUS TRANSAKSI
                $tr->status = 'BERHASIL';
                $tr->keterangan = 'BERHASIL DITAMBAHKAN';

                $tr->save();
                
                if($tr->jenisTransaksi == "TRANSAKSI MASUK"){
                    // TAMBAHKAN POIN PADA NASABAH
                    $nasabah = User::find($tr->id_nasabah);
                    $nasabah->points += $tr->total;
                }elseif($tr->jenisTransaksi == "TRANSAKSI IURANS"){
                    // TAMBAHKAN IURANS PADA NASABAH
                    $nasabah = User::find($tr->id_nasabah);
                    $nasabah->iurans += $tr->total;
                }
               
                $nasabah->save();
            }

            // dd($transaksi);

            $perjalanan->save();
        }

        return redirect(route('validasi-tabungan'));
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
