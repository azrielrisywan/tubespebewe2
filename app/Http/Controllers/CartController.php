<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    public function store(Request $request) {
        $produk = Produk::findOrFail($request->produk_id);

        try {
            Cart::add(
                $produk->id,
                $produk->nama,
                $request->quantity,
                $produk->harga,
            );
        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
            return back();
        }
        toast($request->nama_produk . ' ditambahkan ke cart!', 'success');
        return redirect()->route('transaksi')->with('message', 'Successfully added');
    }

    public function cartList() {
        $cartItems = Cart::content()->toArray();
    }

    public function destroy() {
        Cart::destroy();
        toast('Cart dihapus', 'success');
        return redirect()->route('transaksi');
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
        return redirect()->route('transaksi');
    }

    public function editQuantity(Request $request) {
        $cart = Cart::content()->toArray();
        foreach ($cart as $data) {
            if ($data['id'] == $request->produk_id) {
                Cart::update($data['rowId'], $request->quantity);
            }
        }
        toast('Berhasil! Jumlah barang dalam cart berhasil di update', 'success');
        return redirect()->route('transaksi');
    }
}
