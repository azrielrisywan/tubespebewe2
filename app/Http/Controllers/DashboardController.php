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
    
    function editObat($id)
    {
        try {
                $obat_id = DB::table('produks')
                ->select('nama')
                ->where('id', '=', $id)
                ->get()
                ->toArray();

                $obats = DB::table('produks')
                ->select('id','nama','kategori','pabrikan','tanggal_produksi','tanggal_kedaluwarsa','harga','jumlah_stok')
                ->where('id', '=', $id)
                ->get()
                ->toArray();
                return view('editObat', compact('obats', 'obat_id'));
            
        } catch (Exception $e) {
            Alert::error('Error', $e->getMessage());
            return back();
        }
    }
    function updatedataObat(Request $req,$id){
        $nama = $req->input('nama');
        $harga = $req->input('harga');
        $pabrikan = $req->input('pabrikan');
        $jumlah_stok = $req->input('jumlah_stok');
        $category = $req->input('category');
        $tanggal = $req->input('tanggal');
        $pabrikan = $req->input('pabrikan');
        $tanggal_kedaluwarsa = $req->input('tanggal_kedaluwarsa');

        DB::table('produks')
        ->where('produks.id',$id)
        ->update(
                ['produks.nama' => "$nama"],
            );
        DB::table('produks')
        ->where('produks.id',$id)
        ->update(
                ['produks.harga' => "$harga"],
            );
        DB::table('produks')
        ->where('produks.id',$id)
        ->update(
                ['produks.pabrikan' => "$pabrikan"],
            );
        DB::table('produks')
        ->where('produks.id',$id)
        ->update(
                ['produks.jumlah_stok' => "$jumlah_stok"],
            );
        DB::table('produks')
        ->where('produks.id',$id)
        ->update(
                ['produks.kategori' => "$category"],
            );
        DB::table('produks')
        ->where('produks.id',$id)
        ->update(
                ['produks.tanggal_produksi' => "$tanggal"],
            );
        DB::table('produks')
        ->where('produks.id',$id)
        ->update(
                ['produks.tanggal_kedaluwarsa' => "$tanggal_kedaluwarsa"],
            );   
        toast('Data Updated Succeed!','success');     
        return back();
    }
    public function hapusObat($id) {
        try {
            DB::select('SET FOREIGN_KEY_CHECKS = 0');
            DB::table('produks')->where('id', '=', $id)->delete();
            DB::select('SET FOREIGN_KEY_CHECKS = 1');
            toast('Data berhasil dihapus', 'success');
        } catch (Exception $e) {
            Alert::error('Error', $e->getMessage());
            return back();
        }
        return redirect()->route('dashboard');
    } 
}


