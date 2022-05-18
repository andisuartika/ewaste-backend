<?php

namespace App\Http\Controllers\API;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Perjalanan;
use App\Models\TransaksiItems;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

class TransaksiController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $status = $request->input('status');
        $id_user = Auth::user()->id;
        $roles = Auth::user()->roles;

        if ($id) {
            $transaksi = Transaksi::with(['items.sampah'])->find($id);

            if ($transaksi) {
                return ResponseFormatter::success(
                    $transaksi,
                    'Data transaksi berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data transaksi tidak ada',
                    404
                );
            }
        }

        if ($roles == 'NASABAH') {
            $transaksi = Transaksi::with(['items.sampah'])->where('id_nasabah', $id_user);

            if ($status) {
                $transaksi->where('status', $status);
            }
        }

        if ($roles == 'PETUGAS') {
            $transaksi = Transaksi::with(['items.sampah'])->with(['nasabah'])->where('id_petugas', $id_user);

            if ($status) {
                $transaksi->where('status', $status);
            }
        }

        return ResponseFormatter::success(
            $transaksi->paginate($limit),
            'Data transaksi berhasil diambil'
        );
    }

    public function transaksiMasuk(Request $request)
    {
        $request->validate([
            'id_nasabah' =>  'exists:users,id',
            // 'id_perjalanan' =>  'exists:perjalanan,id',
            // 'items' => 'required|array',
            'items.*.sampah' => 'exists:sampah,id',
            'total' => 'required',
            'jenisTransaksi' => 'required',
            'status' => 'required|in:PENDING,SUCCESS,CANCELLED,FAILED,PROCESS',
        ]);

        // Cek apakah Kode perjalanan valid
        if (Perjalanan::find($request->id_perjalanan)) {

            $transaksi = Transaksi::create([
                'id_petugas' => Auth::user()->id,
                'id_nasabah' => $request->id_nasabah,
                'id_perjalanan' => $request->id_perjalanan,
                'total' => $request->total,
                'jenisTransaksi' => $request->jenisTransaksi,
                'status' => $request->status,
            ]);

            if($request->items){
                foreach ($request->items as $sampah) {
                    TransaksiItems::create([
                        'id_nasabah' => $request->id_nasabah,
                        'sampah' => $sampah['sampah'],
                        'id_transaksi' => $transaksi->id,
                        'kuantitas' => $sampah['kuantitas']
                    ]);
                }
            }           

            return ResponseFormatter::success($transaksi->load('items.sampah'), 'Transaksi berhasil');
        }

        return ResponseFormatter::error(
            null,
            'Kode Perjalanan Tidak Terdaftar',
            404
        );
    }

    public function transaksiByNasabah(Request $request)
    {
        $request->validate([
            // 'id_nasabah' =>  'exists:users,id',
            // 'kode' =>  'exists:perjalanan,kode',
            'items' => 'required|array',
            'items.*.sampah' => 'exists:sampah,id',
            'total' => 'required',
            'jenisTransaksi' => 'required',
            'status' => 'required|in:PENDING,SUCCESS,CANCELLED,FAILED,PROCESS',
        ]);

        // Cek apakah Kode perjalanan valid
        $perjalanan = Perjalanan::where('kode', '=', $request->kode)->first();
        if ($perjalanan) {
            // return $perjalanan->id;
            $transaksi = Transaksi::create([
                'id_petugas' => $perjalanan->id_petugas,
                'id_nasabah' => Auth::user()->id,
                'id_perjalanan' => $perjalanan->id,
                'total' => $request->total,
                'jenisTransaksi' => $request->jenisTransaksi,
                'status' => $request->status,
            ]);

            foreach ($request->items as $sampah) {
                TransaksiItems::create([
                    'id_nasabah' => Auth::user()->id,
                    'sampah' => $sampah['sampah'],
                    'id_transaksi' => $transaksi->id,
                    'kuantitas' => $sampah['kuantitas']
                ]);
            }

            return ResponseFormatter::success($transaksi->load('items.sampah'), 'Transaksi berhasil');
        }

        return ResponseFormatter::error(
            null,
            'Kode Perjalanan Tidak Terdaftar',
            404
        );
    }
}
