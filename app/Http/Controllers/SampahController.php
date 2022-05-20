<?php

namespace App\Http\Controllers;

use App\Models\KategoriSampah;
use App\Models\Sampah;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;

class SampahController extends Controller
{
    private $mediaCollection = 'photo';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.sampah');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = KategoriSampah::all();
        return view('pages.formSampah', compact('kategori'));
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
            'kategori' => ['required'],
            'tentang' => ['required'],
            'pengelolaan' => ['required'],
            'harga' => ['required'],
            'image' => 'required|max:10240'
        ],$message);

        $temporaryFile = TemporaryFile::where('folder', $request->image)->first();

        $image = $temporaryFile->folder.$temporaryFile->filename;

        $sampah = Sampah::create([
            'nama' => $request->nama,
            'tentang' => $request->tentang,
            'pengelolaan' => $request->pengelolaan,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'image' => $image,
        ]);

        if($temporaryFile){
            // $validasi->addMedia(storage_path('app/public/files/tmp/' . $request->file . '/' . $temporaryFile->filename))->toMediaCollection('files');
            // rmdir(storage_path('app/public/files/tmp/' . $request->file));
            $temporaryFile->delete();
        }

        
        
        return redirect()->route('sampah');
        
    }


    public function storeImage(Request $request)
    {
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = now()->timestamp . $file->getClientOriginalName();
            $folder = 'sampah/';
            $file->storeAs('sampah/' , $filename);

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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $kategori = KategoriSampah::all();
        $sampah = Sampah::find($id);
        return view('pages.formSampah', compact('kategori','sampah'));
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
            'kategori' => ['required'],
            'tentang' => ['required'],
            'pengelolaan' => ['required'],
            'harga' => ['required'],
        ]);

        $sampah = Sampah::find($id);

        if($request->image){
            $temporaryFile = TemporaryFile::where('folder', $request->image)->first();
            $image = $temporaryFile->folder.$temporaryFile->filename;
        }else{
            $image = $sampah->image;
        }


        
        $sampah->nama = $request->nama;
        $sampah->tentang = $request->tentang;
        $sampah->pengelolaan = $request->pengelolaan;
        $sampah->kategori = $request->kategori;
        $sampah->harga = $request->harga;
        $sampah->image = $image;

        $sampah->update();
        
        if($request->image)
        {
            if($temporaryFile){
                // $validasi->addMedia(storage_path('app/public/files/tmp/' . $request->file . '/' . $temporaryFile->filename))->toMediaCollection('files');
                // rmdir(storage_path('app/public/files/tmp/' . $request->file));
                $temporaryFile->delete();
            }
        }
        

        
        
        return redirect()->route('sampah')->with('success','updated');
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
