<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

class TentangAplikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tentang = Information::where('tentang','=','tentang')->first();
        return view('pages.tentang-aplikasi',compact('tentang'));
    }

    public function panduanIndex()
    {
        $panduan = Information::where('tentang','=','panduan')->first();
        return view('pages.panduan-aplikasi',compact('panduan'));
    }

    public function snkIndex()
    {
        $syarat = Information::where('tentang','=','syarat-dan-ketentuan')->first();
        return view('pages.syarat-ketentuan',compact('syarat'));
    }

    public function kontakIndex(){
        $email = Information::where('keterangan','=','email')->first();
        $wa = Information::where('keterangan','=','whatsapp')->first();
        $facebook = Information::where('keterangan','=','facebook')->first();
        $telepon = Information::where('keterangan','=','telepon')->first();
        return view('pages.sosmed-links',compact(['email','wa','facebook','telepon']));
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

    // TENTANG APLIKASI

    public function tentangStore(Request $request)
    {
        $request->validate([
            'tentang' => ['required'],
        ]);


        $tentang = Information::updateOrCreate(['id' => $request->id], [
            'tentang' => 'tentang',
            'keterangan' => 'tentang aplikasi',
            'deskripsi' => $request->tentang,
        ]);


        return redirect(route('tentang-aplikasi'))->with('success','Informasi Aplikasi Berhasil diupdate!');
    }


    public function tentangUpdate(Request $request, $id)
    {
        $request->validate([
            'tentang' => ['required'],
        ]);


        $tentang = Information::updateOrCreate(['id' => $request->id], [
            'tentang' => 'tentang',
            'keterangan' => 'tentang aplikasi',
            'deskripsi' => $request->tentang,
        ]);


        return redirect(route('tentang-aplikasi'))->with('success','Informasi Aplikasi Berhasil diupdate!');
    }

    // PANDUAN APLIKASI

    public function panduanStore(Request $request)
    {
        $request->validate([
            'panduan' => ['required'],
        ]);


        $panduan = Information::updateOrCreate(['id' => $request->id], [
            'tentang' => 'panduan',
            'keterangan' => 'panduan aplikasi',
            'deskripsi' => $request->panduan,
        ]);


        return redirect(route('panduan-aplikasi'));
    }


    public function panduanUpdate(Request $request, $id)
    {
        $request->validate([
            'panduan' => ['required'],
        ]);


        $panduan = Information::updateOrCreate(['id' => $request->id], [
            'tentang' => 'panduan',
            'keterangan' => 'panduan aplikasi',
            'deskripsi' => $request->panduan,
        ]);


        return redirect(route('panduan-aplikasi'))->with('success','Panduan Aplikasi Berhasil diupdate!');
    }

    // SYARAT DAN KETENTUAN APLIKASI

    public function syaratStore(Request $request)
    {
        $request->validate([
            'syarat' => ['required'],
        ]);


        $syarat = Information::updateOrCreate(['id' => $request->id], [
            'tentang' => 'syarat-dan-ketentuan',
            'keterangan' => 'syarat dan ketentuan aplikasi',
            'deskripsi' => $request->syarat,
        ]);


        return redirect(route('snk-aplikasi'));
    }


    public function syaratUpdate(Request $request, $id)
    {
        $request->validate([
            'syarat' => ['required'],
        ]);


        $syarat = Information::updateOrCreate(['id' => $request->id], [
            'tentang' => 'syarat-dan-ketentuan',
            'keterangan' => 'syarat dan ketentuan aplikasi',
            'deskripsi' => $request->syarat,
        ]);


        return redirect(route('snk-aplikasi'))->with('success','Syarat dan Ketentuan Aplikasi Berhasil diupdate!');
    }

    // KONTAK APLIKASI

    public function kontakStore(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'wa' => ['required'],
            'facebook' => ['required'],
            'telepon' => ['required'],
        ]);


        $email = Information::updateOrCreate(['id' => $request->id], [
            'tentang' => 'kontak',
            'keterangan' => 'email',
            'deskripsi' => $request->email,
        ]);

        $wa = Information::updateOrCreate(['id' => $request->id], [
            'tentang' => 'kontak',
            'keterangan' => 'whatsapp',
            'deskripsi' => $request->wa,
        ]);

        $facebook = Information::updateOrCreate(['id' => $request->id], [
            'tentang' => 'kontak',
            'keterangan' => 'facebook',
            'deskripsi' => $request->facebook,
        ]);

        $telepon = Information::updateOrCreate(['id' => $request->id], [
            'tentang' => 'kontak',
            'keterangan' => 'telepon',
            'deskripsi' => $request->telepon,
        ]);


        return redirect(route('kontak'));
    }


    public function kontakUpdate(Request $request, $id)
    {
        $request->validate([
            'email' => ['required'],
            'wa' => ['required'],
            'facebook' => ['required'],
            'telepon' => ['required'],
        ]);


        $email = Information::updateOrCreate(['id' => $request->id], [
            'tentang' => 'kontak',
            'keterangan' => 'email',
            'deskripsi' => $request->email,
        ]);

        $wa = Information::updateOrCreate(['id' => $request->id], [
            'tentang' => 'kontak',
            'keterangan' => 'whatsapp',
            'deskripsi' => $request->wa,
        ]);

        $facebook = Information::updateOrCreate(['id' => $request->id], [
            'tentang' => 'kontak',
            'keterangan' => 'facebook',
            'deskripsi' => $request->facebook,
        ]);

        $telepon = Information::updateOrCreate(['id' => $request->id], [
            'tentang' => 'kontak',
            'keterangan' => 'telepon',
            'deskripsi' => $request->telepon,
        ]);


        return redirect(route('kontak'))->with('success','Kontak Berhasil diupdate!');
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
