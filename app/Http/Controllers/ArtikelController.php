<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;
use Illuminate\Support\Facades\Auth;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.artikel');
    }

    public function artikel()
    {
        $artikels = Artikel::latest()->paginate(10);
        return view('artikel.artikel',compact('artikels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.artikel-create');
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
            'title.required' => 'Judul tidak boleh Kosong',
            'description.required' => 'Deskripsi tidak boleh Kosong',
            'content.required' => 'Konten tidak boleh Kosong',
            'cover.required' => 'Cover tidak boleh Kosong',
            'status.required' => 'Status tidak boleh Kosong',
        ];
        
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'content' => ['required'],
            'status' => ['required'],
            'cover' => 'required|max:10240'
        ],$message);

        $temporaryFile = TemporaryFile::where('folder', $request->cover)->first();

        $cover = $temporaryFile->folder.$temporaryFile->filename;

        $author = Auth::user()->id;
        $slug = Str::slug($request->title, '-');

        $artikel = Artikel::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'status' => $request->status,
            'author' => $author,
            'cover' => $cover,
            'slug' => $slug,
        ]);

        if($temporaryFile){
            // $validasi->addMedia(storage_path('app/public/files/tmp/' . $request->file . '/' . $temporaryFile->filename))->toMediaCollection('files');
            // rmdir(storage_path('app/public/files/tmp/' . $request->file));
            $temporaryFile->delete();
        }

        
        
        return redirect()->route('artikel')->with('success','Artikel Berhasil ditambahkan!');
        
    }

    public function storeImage(Request $request)
    {
        if($request->hasFile('cover')){
            $file = $request->file('cover');
            $filename = now()->timestamp . $file->getClientOriginalName();
            $folder = 'artikel/cover/';
            $file->storeAs('artikel/cover/' , $filename);

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
    public function show($slug)
    {
        $artikel = Artikel::where('slug',$slug)->first();
        return view('artikel.artikel-view',compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = Artikel::find($id);

        return view('pages.artikel-create',compact('artikel'));
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
        $message=[
            'title.required' => 'Judul tidak boleh Kosong',
            'description.required' => 'Deskripsi tidak boleh Kosong',
            'content.required' => 'Konten tidak boleh Kosong',
            'cover.required' => 'Cover tidak boleh Kosong',
            'status.required' => 'Status tidak boleh Kosong',
        ];
        
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'content' => ['required'],
            'status' => ['required'],
            'cover' => 'max:10240'
        ],$message);


        $artikel = Artikel::find($id);

        if($request->cover){
            $temporaryFile = TemporaryFile::where('folder', $request->cover)->first();
            $cover = $temporaryFile->folder.$temporaryFile->filename;
        }else{
            $cover = $artikel->cover;
        }

        $slug = Str::slug($request->title, '-');

        
        $artikel->title = $request->title;
        $artikel->description = $request->description;
        $artikel->content = $request->content;
        $artikel->status = $request->status;
        $artikel->slug = $slug;
        $artikel->cover = $cover;

        $artikel->update();
        
        if($request->cover)
        {
            if($temporaryFile){
                // $validasi->addMedia(storage_path('app/public/files/tmp/' . $request->file . '/' . $temporaryFile->filename))->toMediaCollection('files');
                // rmdir(storage_path('app/public/files/tmp/' . $request->file));
                $temporaryFile->delete();
            }
        }
        

        
        
        return redirect()->route('artikel')->with('success','Artikel Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Artikel::find($id)->delete();

        return view('pages.artikel');
    }
}
