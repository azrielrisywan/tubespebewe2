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
                ->paginate(5);


            $produks = DB::table('produks')
                ->select('id', 'nama', 'kategori', 'pabrikan', 'tanggal_produksi', 'tanggal_kedaluwarsa', 'harga', 'jumlah_stok')
                ->paginate(5);

            $transaksi = DB::table('orders')
                ->select('orders.id', 'orders.tanggal_order', 'orders.metode_pembayaran', 'produks.nama', 'orderdetails.jumlah')
                ->join('orderdetails', 'orderdetails.id', '=', 'orders.id')
                ->join('produks', 'produks.id', '=', 'orderdetails.produk_id')
                ->orderBy('orders.id', 'desc')
                ->paginate(5);


            return view('dashboard', compact('karyawans', 'produks', 'transaksi'));
        } catch (Exception $e) {
            Alert::error('Error', $e->getMessage());
            return back();
        }

    }
    function editKaryawan($id)
    {
        try {
            $nama_karyawan = DB::table('karyawan')
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


                return view('editKaryawan', compact('karyawans', 'nama_karyawan'));

        } catch (Exception $e) {
            Alert::error('Error', $e->getMessage());
            return back();
        }
    }
    function updatedata(Request $req, $id){
        $nama = $req->input('nama');
        $kontak = $req->input('noHP');
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
        toast('Data berhasil diedit!', 'success');
        return redirect()->route('dashboard', compact('update_nama', 'update_masa_kontrak', 'update_kontak'));
    }

    public function hapusKaryawan($id) {
        try {
            DB::table('karyawan')->where('id', '=', $id)->delete();
            toast('Data berhasil dihapus', 'success');
        } catch (Exception $e) {
            Alert::error('Error', $e->getMessage());
            return back();
        }
        return redirect()->route('dashboard');
    }
}


