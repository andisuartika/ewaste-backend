<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.nasabah');
    }

    public function print($id)
    {
        $user = User::find($id);
        return view('pages.nasabahPrint',compact('user'));
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
        $nasabah = User::find($id);

        return view('pages.nasabahDetail', compact('nasabah'));
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
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'alamat' => 'required',
            'noHp' => 'required|unique:users,noHp,'.$id,
        ]);

        $nasabah = User::find($id);

        $nasabah->name = $request->name;
        $nasabah->email = $request->email;
        $nasabah->alamat = $request->alamat;
        $nasabah->noHp = $request->noHp;

        $nasabah->save();

        return view('pages.nasabah');
    }


    public function pembayaranStore(Request $request, $id)
    {
        $request->validate([
            'jumlah' => ['required'],
        ]);


        $user = User::find($id);
        $user->iurans -= $request->jumlah;
        
        $user->save();
        
        return redirect(route('pembayaran-iurans'))->with('success','updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return view('pages.nasabah');
    }
}
