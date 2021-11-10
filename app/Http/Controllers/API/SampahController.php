<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Sampah;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class SampahController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $nama = $request->input('nama');

        if ($id) {
            $sampah = Sampah::find($id);

            if ($sampah) {
                return ResponseFormatter::success(
                    $sampah,
                    'Data sampah berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data sampah tidak ada',
                    404
                );
            }
        }

        $sampah = Sampah::all();
        if ($nama) {
            $sampah = Sampah::where('nama', 'like', '%' . $nama . '%');
        }
        return ResponseFormatter::success(
            $sampah,
            'Data sampah berhasil diambil'
        );
    }

    public function inputSampah(Request $request)
    {
        try {
            $request->validate([
                'nama' => ['required', 'string', 'max:255'],
                'harga' => ['required'],
            ]);

            Sampah::create([
                'nama' => $request->nama,
                'harga' => $request->harga,
            ]);

            $sampah = Sampah::where('nama', $request->nama)->first();

            return ResponseFormatter::success([
                'sampah' => $sampah,
            ], 'Sampah Berhasil ditambahkan');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Shometing went wrong',
                'error' => $error,
            ], 'Kesalahan Koneksi', 500);
        }
    }

    public function updateSampah(Request $request, $id)
    {
        try {
            $sampah = Sampah::find($id);
            $request->validate([
                'nama' => 'required',
                'harga' => 'required',
            ]);

            $sampah->nama = $request->nama;
            $sampah->harga = $request->harga;

            $sampah->update();

            return ResponseFormatter::success($sampah, 'Sampah updated');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Shometing went wrong',
                'error' => $error,
            ], 'Kesalahan Koneksi', 500);
        }
    }

    public function destroy($id)
    {
        try {
            $sampah = Sampah::find($id);
            Sampah::find($id)->delete();
            return ResponseFormatter::success($sampah, 'Sampah Deleted');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Shometing went wrong',
                'error' => $error,
            ], 'Kesalahan Koneksi', 500);
        }
    }
}
