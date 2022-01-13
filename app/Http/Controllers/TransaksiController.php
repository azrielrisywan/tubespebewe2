<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Request;

class TransaksiController extends Controller
{
    public function index() {
        $produks = \DB::table('produks')
                    ->select('id', 'nama', 'kategori', 'harga', 'jumlah_stok')
                    ->get()
                    ->toArray();

        $cart = Cart::content();

        return view('/transaksi', compact('produks', 'cart'));
    }
}
