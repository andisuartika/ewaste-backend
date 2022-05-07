<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\TransaksiPoin as ModelsTransaksiPoin;

class TransaksiPoin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'bank' =>  'exists:banks,id',
            'nomor' => 'required',
            'nama' => 'required',
            'jumlah' => 'required',
        ]);

        $id = Auth::user()->id;
        $user = User::find($id);

        if($user->points > $request->jumlah){
            $poin = ModelsTransaksiPoin::create([
                'id_user' => $id,
                'bank' => $request->bank,
                'nomor' => $request->nomor,
                'nama' => $request->nama,
                'jumlah' => $request->jumlah,
            ]);
            return ResponseFormatter::success($poin, 'Transaksi berhasil');
        } 

        return ResponseFormatter::error(
            null,
            'Points Tidak Cukup!',
            404
        );

        
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
