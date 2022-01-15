<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="d-flex p-2 flex-row-reverse px-2 mb-4 py-2 sm:rounded-lg bg-gray-100 overflow-hidden shadow-sm">
                        <form method="post" action="{{ route('cart.destroy') }}">
                            @csrf
                            <button type="submit" class="form-control mt-2 ml-2 btn btn-danger btn-sm">Remove Cart</button>
                        </form>
                        <a href="{{ route('checkout') }}"><button type="submit" class="form-control mt-2 btn btn-info btn-sm">Show Cart & Checkout</button></a>
                        <p class="mt-3 mx-2">Cart ({{ \Gloudemans\Shoppingcart\Facades\Cart::content()->count() }} Barang)</p>
                        <i class="material-icons mt-3">add_shopping_cart</i>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" class="">Nama</th>
                                <th scope="col" class="">Kategori</th>
                                <th scope="col" class="">Harga</th>
                                <th scope="col" class="">Stok</th>
                                <th scope="col" class="col-sm-1">Jumlah</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($produks as $produk)
                                <tr>
                                    <td>{{$produk->nama}}</td>
                                    <td>{{$produk->kategori}}</td>
                                    <td>Rp {{number_format($produk->harga)}}</td>
                                    <td>{{number_format($produk->jumlah_stok)}}</td>
                                    <td>
                                        @if ($cart->where('id', $produk->id)->count())
                                            <form method="post" action="{{ route('cart.removeitem') }}">
                                                @csrf
                                                <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                                                <button type="submit" class="form-control mt-1 btn btn-outline-warning btn-sm">Remove Item</button>
                                            </form>
                                            <form method="post" action="{{ route('cart.editquantity') }}">
                                                @csrf
                                                <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                                                @php
                                                $cartArray = $cart->toArray();
                                                $itemqty = 0;
                                                foreach ($cartArray as $data) {
                                                    if ($data['id'] == $produk->id) {
                                                        $itemqty = $data['qty'];
                                                    }
                                                }
                                                @endphp
                                                <input type="number" class="form-control-sm mt-1" name="quantity" value="{{ $itemqty }}">
                                                <button type="submit" class="form-control mt-1 btn btn-outline-secondary btn-sm">Edit Quantity</button>
                                            </form>
                                        @else
                                            <form method="post" action="{{ route('cart.store') }}">
                                                @csrf
                                                <input type="hidden" name="nama_produk" value="{{ $produk->nama }}">
                                                <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                                                <input type="number" name="quantity" value="{{ old('quantity') }}" class="form-control-sm">
                                                <button type="submit" class="form-control mt-3 btn btn-outline-primary btn-sm">Add to cart</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
