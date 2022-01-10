<?php

namespace App\Http\Controllers;

use App\Http\Requests\TambahProdukRequest;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function tambah(TambahProdukRequest $request) {

        DB::table('produks')->insert([
           'nama' => "$request->nama",
           'kategori' => "$request->kategori",
           'pabrikan' => "$request->pabrikan",
           'tanggal_produksi' => "$request->tanggalproduksi",
           'tanggal_kedaluwarsa' => "$request->tanggalkedaluwarsa",
           'harga' => "$request->harga",
           'jumlah_stok' => "$request->jumlahstok",
        ]);

        return back()->with('success',' Data berhasil dimasukkan.');
    }
}
