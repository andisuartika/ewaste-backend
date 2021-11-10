<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Perjalanan;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class PerjalananController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');

        if ($id) {
            $perjalanan = Perjalanan::find($id);

            if ($perjalanan) {
                return ResponseFormatter::success(
                    $perjalanan,
                    'Data Perjalanan berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data Perjalanan tidak ada',
                    404
                );
            }
        }

        $perjalanan = Perjalanan::all();
        return ResponseFormatter::success(
            $perjalanan,
            'Data Perjalanan berhasil diambil'
        );
    }

    public function createPerjalanan(Request $request)
    {
        // Mengambil kode terbesar
        $kodeMax = Perjalanan::max('kode');
        $result = substr($kodeMax, 1, 3);
        $result++;

        $kode = 'P' . sprintf("%03s", $result) . '-' . date("d-m") . '-' . date("Y");

        try {

            $request->validate([
                'id_petugas' => ['required'],
                'waktuTugas' => ['required'],
                'keterangan' => ['required']
            ]);

            Perjalanan::create([
                'kode' => $kode,
                'id_petugas' => $request->id_petugas,
                'waktuTugas' => $request->waktuTugas,
                'keterangan' => $request->keterangan,
            ]);

            $perjalanan = Perjalanan::where('kode', $kode)->first();

            return ResponseFormatter::success([
                'perjalanan' => $perjalanan,
            ], 'Perjalanan Berhasil ditambahkan');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Shometing went wrong',
                'error' => $error,
            ], 'Kesalahan Koneksi', 500);
        }
    }
}
