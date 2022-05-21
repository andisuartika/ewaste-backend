<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('pages.petugas');
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
        dd('ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $petugas = User::find($id);
        return view('pages.petugasDetail', compact('petugas'));
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('profile.profile',compact('user'));
    }

    public function storeImage(Request $request)
    {
        $id = Auth::user()->id;  

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = $id . '-' . now()->timestamp . '.'  . $file->getClientOriginalName();
            $folder = 'usersProfile/';
            $file->storeAs('usersProfile/' , $filename);

            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename
            ]);

            return $folder;
        }

        return '';
    } 

    public function changePassword()
    {
        $user = User::find(Auth::user()->id);

        return view('profile.change-password',compact('user'));
    }

    public function updatePassword(Request $request)
    {

        $this->validate($request, [
            'oldPassword' => ['required', function ($attribute, $value, $fail) {
                if (!\Hash::check($value, Auth::user()->password)) {
                    return $fail(__('Password lama tidak sesuai!'));
                }
            }],
            'newPassword' => 'required_with:confirmPassword|same:confirmPassword',
            'confirmPassword' => 'min:4'
        ]);

        $user = Auth::user();

        $user->update([
            'password' => Hash::make($request->newPassword),
        ]); 
        
        
        return Redirect::back()->with('success','update');
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'noHp' => 'required',
            'alamat' => 'required'
        ]);

        $user = User::find($id);


        if($request->image){
            $temporaryFile = TemporaryFile::where('folder', $request->image)->first();
            $image = $temporaryFile->folder.$temporaryFile->filename;
        }else{
            $image = $user->profile_photo_path;
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'noHp' => $request->noHp,
            'alamat' => $request->alamat,
            'profile_photo_path' => $image,
        ]); 

        if($request->image)
        {
            if($temporaryFile){
                $temporaryFile->delete();
            }
        }

        return Redirect::back()->with('success','update');
        
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
