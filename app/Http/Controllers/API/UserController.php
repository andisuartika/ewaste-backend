<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\FCM;
use App\Models\Transaksi;
use App\Models\TransaksiItems;
use App\Models\TransaksiPoin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string'],
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user = User::where('email', $request->email)->first();

            $tokenResult = $user->createToken('authToken')->plainTextToken;

            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user
            ], 'User Registered');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Shometing went wrong',
                'error' => $error,
            ], 'Authentication Failed', 500);
        }
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);

            $credentials = request(['email', 'password']);
            if (!Auth::attempt($credentials)) {
                return ResponseFormatter::error([
                    'message' => 'Unauthorized'
                ], 'Authentication Failed', 500);
            }

            $user = User::where('email', $request->email)->first();

            if (!Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Invalid Credential');
            }

            $tokenResult = $user->createToken('authToken')->plainTextToken;
            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user,
            ], 'Authenticated');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }

    public function fetch(Request $request)
    {
        return ResponseFormatter::success($request->user(), 'Data profile user berhasil diambil');
    }

    public function getUser(Request $request){
        $id = $request->input('id');
        $name = $request->input('name');
        $alamat = $request->input('alamat');
        $roles = $request->input('roles');
        $kodeNasabah = $request->input('kode');

        if ($id) {
            $user = User::find($id);

            if ($user) {
                return ResponseFormatter::success(
                    $user,
                    'Data Pengguna berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data Pengguna tidak ada',
                    404
                );
            }
        }


        $users = User::latest()->paginate(5);
        if ($kodeNasabah) {
            $users = User::where('kode_nasabah', '=',  $kodeNasabah )->first();
        }
        if ($name) {
            $users = User::where('name', 'like', '%'. $name.'%' )->get();
        }
        if ($alamat) {
            $users = User::where('alamat', 'like', '%'. $alamat.'%' )->get();
        }
        if ($roles) {
           $users = User::where('roles', 'like', '%'. $roles.'%' )->get();
        }

        if ($users) {
            return ResponseFormatter::success(
                $users,
                'Data Pengguna berhasil diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data Pengguna tidak ada',
                404
            );
        }
    }


    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'alamat' => ['required', 'string'],
            'noHp' => ['nullable', 'string', 'max:255', 'unique:users,noHp,' . $user->id],
            'profile_photo_path' => 'mimes:png,jpg,jpeg',
        ]);

               
        try {
            if ($request->hasFile('profile_photo_path')) {
                $fileName = $user->name . '-' . date("Y-m-d") . '-' . time() . '.' . $request->file('profile_photo_path')->getClientOriginalExtension();
                $path = $request->file('profile_photo_path')->storeAs('usersProfile', $fileName);
                $user->profile_photo_path = $path;
            }
            $user->update($data);
            return ResponseFormatter::success($user, 'Profile updated');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 500);
        }

        

        return ResponseFormatter::success($user, 'Profile updated');
    }

    public function changePassword(Request $request){
        $user = Auth::user();
        $data = $request->all();

        try {
            $request->validate([
                'email' => 'email|required',
                'password' => 'required',
                'new_password' => 'required'
            ]);

            $user = User::where('email', $request->email)->first();

            if (!Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Invalid Credential');
            }

            $data['password'] = Hash::make($request->new_password);
            $user->update($data);
            
            return ResponseFormatter::success([
                // 'user' => $user,
                'message' => 'Password has changed',
            ], 'Authenticated');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Password Salah',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }

    public function logout(Request $request)
    {
        $token = $request->user()->currentAccessToken()->delete();

        return ResponseFormatter::success($token, 'Token Revoked');
    }


    // NASABAH
    public function getTabungan(Request $request)
    {
        $id = Auth::user()->id;

        $tabungan = Transaksi::where('id_nasabah',$id)->where('status','=','BERHASIL')->where('jenisTransaksi','=','TRANSAKSI MASUK')->sum('total');
        $ditarik = TransaksiPoin::where('id_user',$id)->where('status','=','BERHASIL')->sum('jumlah');
        $sampah = [
            'oraganik' => TransaksiItems::where('id_nasabah',$id)->where('sampah',1)->sum('kuantitas'),
            'plastik' => TransaksiItems::where('id_nasabah',$id)->where('sampah',2)->sum('kuantitas'),
            'kertas' => TransaksiItems::where('id_nasabah',$id)->where('sampah',3)->sum('kuantitas'),
            'logam' => TransaksiItems::where('id_nasabah',$id)->where('sampah',4)->sum('kuantitas'),
            'kaca' => TransaksiItems::where('id_nasabah',$id)->where('sampah',5)->sum('kuantitas'),
        ];
        $data = [
            'tabungan' => $tabungan,
            'ditarik' => $ditarik,
            'sampah' => $sampah,
        ];
        if ($data) {
            return ResponseFormatter::success(
                $data,
                'Data Tabungan Nasabah berhasil diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data Tabungan Nasabah tidak ada',
                404
            );
        }
    
    }

    public function getTransaksi(Request $request)
    {
        $id = Auth::user()->id;

        $transaksi = Transaksi::where('id_nasabah',$id)->get();
        if ($transaksi) {
            return ResponseFormatter::success(
                $transaksi,
                'Data Transaksi Nasabah berhasil diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data Transaksi Nasabah tidak ada',
                404
            );
        }

    }


    public function getTransaksiPetugas(Request $request)
    {
        $id = Auth::user()->id;

        $transaksi = Transaksi::where('id_petugas',$id)->get();
        if ($transaksi) {
            return ResponseFormatter::success(
                $transaksi,
                'Data Transaksi Nasabah berhasil diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data Transaksi Nasabah tidak ada',
                404
            );
        }

    }

    // FCM TOKEN
    public function fcm(Request $request)
    {
        try {
            $request->validate([
                'token' => ['required'],
            ]);

            FCM::updateorCreate([
                'user' => Auth::user()->id,
            ],[
                'token' => $request->token,
            ]);

            $token = FCM::where('user', Auth::user()->id)->first();

            return ResponseFormatter::success([
                'FCM' => $token,
            ], 'Token Updated');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Shometing went wrong',
                'error' => $error,
            ], 'Shometing Error', 500);
        }
    }
}
