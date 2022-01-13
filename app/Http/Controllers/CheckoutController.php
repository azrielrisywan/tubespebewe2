<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index() {
        $cart = Cart::content()->toArray();
        $cartCount = Cart::count();
        $produks = \DB::table('produks')
            ->select('id', 'nama', 'kategori', 'harga', 'jumlah_stok')
            ->get()
            ->toArray();

        return view('checkout', compact('cart', 'cartCount', 'produks'));
    }

    public function remove(Request $request) {
        $cart = Cart::content()->toArray();
        $rowId = '';
        $nama_produk = '';
        $produk_id = $request->produk_id;

        foreach ($cart as $data) {
            if ($data['id'] == $produk_id) {
                $rowId = $data['rowId'];
                $nama_produk = $data['name'];
            }
        }

        Cart::remove($rowId);
        toast($nama_produk . ' dihapus dari cart!', 'success');
        return redirect()->route('checkout');
    }

    public function editQuantity(Request $request) {
        $cart = Cart::content()->toArray();
        foreach ($cart as $data) {
            if ($data['id'] == $request->produk_id) {
                Cart::update($data['rowId'], $request->quantity);
            }
        }
        toast('Berhasil! Jumlah barang dalam cart berhasil di update', 'success');
        return redirect()->route('checkout');
    }
}
