<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function index() {
        try {
            $karyawans = DB::table('karyawan')
                ->select('karyawan.nama', 'karyawan.kontak', 'karyawan.masa_kontrak', 'shift.waktu_kerja')
                ->join('shift','karyawan.shift_id', '=','shift.id')
                ->get()
                ->toArray();

            $produks = DB::table('produks')
                ->select('id', 'nama', 'kategori', 'pabrikan', 'tanggal_produksi', 'tanggal_kedaluwarsa', 'harga', 'jumlah_stok')
                ->get()
                ->toArray();

            return view('dashboard', compact('karyawans', 'produks'));
        } catch (Exception $e) {
            Alert::error('Error', $e->getMessage());
            return back();
        }

    }
    function editKaryawan()
    {
        try {
            $karyawans = DB::table('karyawan')
                ->select('karyawan.nama', 'karyawan.kontak', 'karyawan.masa_kontrak', 'shift.waktu_kerja')
                ->join('shift', 'karyawan.shift_id', '=', 'shift.id')
                ->get()
                ->toArray();
            return view('editKaryawan', compact('karyawans'));
        } catch (Exception $e) {
            Alert::error('Error', $e->getMessage());
            return back();
        }

    }

    }


