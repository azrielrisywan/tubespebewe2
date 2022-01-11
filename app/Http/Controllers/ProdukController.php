<?php

namespace App\Http\Controllers;

use App\Http\Requests\TambahProdukRequest;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ProdukController extends Controller
{
    public function store(Request $request) {

        $request->validate([
            'nama'=> 'required',
            'kategori'=> 'required',
            'pabrikan'=> 'required',
            'tanggalproduksi'=> 'required|date',
            'tanggalkedaluwarsa'=> 'nullable|date|after_or_equal:tanggalproduksi',
            'harga'=> 'required|int',
            'jumlahstok'=> 'required|int',
        ],[
            'nama.required' => 'Nama harus diisi!',
            'kategori.required' => 'Kategori harus diisi!',
            'pabrikan.required' => 'Pabrikan harus diisi!',
            'tanggalproduksi.required' => 'tanggal produksi harus diisi!',
            'tanggalproduksi.date' => 'Isian tanggal produksi harus berupa "date"',
            'tanggalkedaluwarsa.date' => 'Isian tanggal kedaluwarsa harus berupa "date"',
            'tanggalkedaluwarsa.after_or_equal' => 'Isian tanggal kedaluwarsa harus tanggal sesudah/sama dengan tanggal produksi',
            'harga.required' => 'Harga harus diisi!',
            'harga.int' => 'Harga harus berupa angka!',
            'jumlahstok.required' => 'Jumlah stok harus diisi!',
            'jumlahstok.int' => 'Jumlah stok harus berupa angka!',
        ]);

        try {
            DB::table('produks')->insert([
                'nama' => "$request->nama",
                'kategori' => "$request->kategori",
                'pabrikan' => "$request->pabrikan",
                'tanggal_produksi' => "$request->tanggalproduksi",
                'tanggal_kedaluwarsa' => "$request->tanggalkedaluwarsa",
                'harga' => "$request->harga",
                'jumlah_stok' => "$request->jumlahstok",
            ]);
            toast('Data berhasil dimasukkan!', 'success');
            return back();
        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
            return back();
        }
    }
}
