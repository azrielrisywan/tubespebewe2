<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

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

    public function bayar() {
        $cart = Cart::content();
        $produks = Produk::all();


        foreach ($cart as $data) {
            foreach ($produks as $produk) {
                if ($produk->id == $data->id) {
                    if ((int)$data->qty > $produk->jumlah_stok) {
                        Alert::error('Error', 'Jumlah stok '. $data->name . ' tidak mencukupi!');
                        return back();
                    }
                }
            }
        }

        foreach ($cart as $data) {
            DB::table('produks')
                ->where('id', '=', $data->id)
                ->decrement('jumlah_stok', (int)$data->qty);
        }

        DB::table('orders')->insertGetId([
            'tanggal_order' => Carbon::now()->toDateTimeString(),
            'metode_pembayaran' => null,
            'total_bayar' => Cart::priceTotal(),
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        return redirect()->route('checkout.orderdetails');
    }

    public function orderdetails() {
        $cart = Cart::content();
        foreach ($cart as $data) {
            $idTemp = DB::table('orders')
                    ->select('id')
                    ->latest()
                    ->first();
            foreach ($idTemp as $getId) {
                $idOrders = $getId;
            }
            DB::table('orderdetails')->insert([
                'id' => $idOrders,
                'produk_id' => $data->id,
                'jumlah' => $data->qty,
                'harga_satuan' => $data->price,
            ]);
        }
        Alert::success('Berhasil!', 'Total bayar sebesar Rp'. (Cart::priceTotal()));
        Cart::destroy();
        return redirect()->route('transaksi');
    }
}
