<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller
{
    public function index() {
        try {
            $karyawans = DB::table('karyawan')
                ->select('karyawan.id', 'karyawan.nama', 'karyawan.kontak', 'karyawan.masa_kontrak', 'shift.waktu_kerja', 'shift_id')
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
    function editKaryawan($id)
    {
        try {
            $karyawan_id = DB::table('karyawan')
                ->select('nama')
                ->where('id', '=', $id)
                ->get()
                ->toArray();

                $karyawans = DB::table('karyawan')
                ->select('karyawan.id', 'karyawan.nama', 'karyawan.kontak', 'karyawan.masa_kontrak', 'shift.waktu_kerja','shift_id')
                ->join('shift', 'karyawan.shift_id', '=', 'shift.id')
                ->where('karyawan.id', '=', $id)
                ->get()
                ->toArray();
                return view('editKaryawan', compact('karyawans', 'karyawan_id'));
            
        } catch (Exception $e) {
            Alert::error('Error', $e->getMessage());
            return back();
        }
    }
    function updatedata(Request $req,$id){
        $nama = $req->input('nama');
        echo $nama;
        $kontak = $req->input('noHP');
        var_dump($kontak);
        $masa_kontrak = $req->input('masaKontrak');
        $waktu_kerja = $req->input('shift');
        $update_nama = DB::table('karyawan')
            ->join('shift', 'karyawan.shift_id', '=', 'shift.id')
            ->where('karyawan.id',$id)
            ->update(
                    ['karyawan.nama' => $nama],
                );
        $update_kontak = DB::table('karyawan')
        ->join('shift', 'karyawan.shift_id', '=', 'shift.id')
        ->where('karyawan.id',$id)
        ->update(
                ['karyawan.kontak' => "$kontak"],
            );
        $update_masa_kontrak = DB::table('karyawan')
        ->join('shift', 'karyawan.shift_id', '=', 'shift.id')
        ->where('karyawan.id',$id)
        ->update(
                ['karyawan.masa_kontrak' => $masa_kontrak],
            );
        DB::table('karyawan')
        ->join('shift', 'karyawan.shift_id', '=', 'shift.id')
        ->where('karyawan.id',$id)
        ->update(
                ['shift_id' => $waktu_kerja]
            );
        return back();
    }
}


