<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.banner-event');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.banner-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message=[
            'required'=> 'Field tidak boleh kosong',
        ];
        
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required'],
            'link' => ['required'],
            'gambar' => 'required|max:10240'
        ],$message);

        $temporaryFile = TemporaryFile::where('folder', $request->gambar)->first();

        $gambar = $temporaryFile->folder.$temporaryFile->filename;

        $sampah = Banner::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'link' => $request->link,
            'gambar' => $gambar,
        ]);

        if($temporaryFile){
            // $validasi->addMedia(storage_path('app/public/files/tmp/' . $request->file . '/' . $temporaryFile->filename))->toMediaCollection('files');
            // rmdir(storage_path('app/public/files/tmp/' . $request->file));
            $temporaryFile->delete();
        }

        
        
        return redirect()->route('banner');
    }

    public function storeImage(Request $request)
    {
        if($request->hasFile('gambar')){
            $file = $request->file('gambar');
            $filename = $file->getClientOriginalName();
            $folder = 'banner/';
            $file->storeAs('banner/' , $filename);

            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename
            ]);

            return $folder;
        }

        return '';
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
        $banner = Banner::find($id);

        return view('pages.banner-form',compact('banner'));
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
            'nama' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required'],
            'link' => ['required'],
        ]);

        $banner = Banner::find($id);

        if($request->gambar){
            $temporaryFile = TemporaryFile::where('folder', $request->gambar)->first();
            $gambar = $temporaryFile->folder.$temporaryFile->filename;
        }else{
            $gambar = $banner->gambar;
        }


        
        $banner->nama = $request->nama;
        $banner->deskripsi = $request->deskripsi;
        $banner->link = $request->link;
        $banner->gambar = $gambar;

        $banner->update();
        
        if($request->gambar)
        {
            if($temporaryFile){
                // $validasi->addMedia(storage_path('app/public/files/tmp/' . $request->file . '/' . $temporaryFile->filename))->toMediaCollection('files');
                // rmdir(storage_path('app/public/files/tmp/' . $request->file));
                $temporaryFile->delete();
            }
        }
        

        
        
        return redirect()->route('banner');
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
