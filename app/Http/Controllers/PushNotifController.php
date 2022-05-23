<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;

class PushNotifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $now = Carbon::now();
        $count = Notification::count();
        $notifications = Notification::latest()->paginate(10);
        return view('pages.broadcast-notification',compact(['notifications','now','count']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.notification-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
    {

        $message=[
            'title.required'=> 'Judul tidak boleh kosong',
            'description.required'=> 'Deskripsi tidak boleh kosong',
            'priority.required'=> 'Prioritas tidak boleh kosong',
        ];
        
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'priority' => ['required'],
        ],$message);

        $to = "allDevice";

        if($request->isScheduler != 'on'){
            $scheduler = Carbon::now();
        }else{
            $scheduler = $request->schedule;
        }

        $temporaryFile = TemporaryFile::where('folder', $request->image)->first();

        $image = url('/laravel/storage/app/public/').$temporaryFile->folder.$temporaryFile->filename;

        $notif = Notification::create([
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'schedule' => $scheduler,
            'image' => $image,
            'data' => $request->data,
            'to' => $to,
        ]);
        
        $notification = Notification::find($notif->id);

        // PUSH TO FCM
        $data = [
            'title' => $notification->title,
            'body' => $notification->description,
            'soundName' => 'default',
        ];

        // if($request->image){
        //     $image = [
        //         'image' => $notification->image,
        //     ];

        //     $data = $data + $image;
        // }   

        if($request->isScheduler == 'on'){
            $scheduleTime = [
                'scheduledTime' => $notification->schedule,
            ];

            $data = $data + $scheduleTime;
        }

        fcm()
            ->toTopic($to)
            ->priority($notif->priority)
            ->notification($data)
            ->send();
        
        if($temporaryFile){
            // $validasi->addMedia(storage_path('app/public/files/tmp/' . $request->file . '/' . $temporaryFile->filename))->toMediaCollection('files');
            // rmdir(storage_path('app/public/files/tmp/' . $request->file));
            $temporaryFile->delete();
        }

        return redirect()->route('push-notif')->with('success','Notifikasi Berhasil dibuat!');
    }

    public function storeImage(Request $request)
    {
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = now()->timestamp . $file->getClientOriginalName();
            $folder = 'notif/';
            $file->storeAs('notif/' , $filename);

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
