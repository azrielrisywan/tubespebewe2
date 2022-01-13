<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cart & Checkout') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($cartCount <= 0)
                        <a href="{{ route('transaksi') }}" ><button class="form-control col-md-1 btn btn-dark mx-2 btn-sm">Back</button></a>
                        Cart Kosong
                    @else
                    <div class="table table-responsive">
                        <a href="{{ route('transaksi') }}" ><button class="form-control col-md-1 btn btn-light">Back</button></a>
                        <table class="mt-4 table table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Harga</th>
                                <th scope="col" class="col-sm-1"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cart as $data)
                                <tr>
                                    <td>{{$data['id']}}</td>
                                    <td>{{$data['name']}}</td>
                                    <td>{{$data['qty']}}</td>
                                    <td>Rp{{number_format($data['price'])}}</td>
                                    <td>
                                        <form method="post" action="{{ route('checkout.removeitem') }}">
                                            @csrf
                                            @php
                                                $produk_id = '';
                                                $itemqty = 0;
                                                foreach ($produks as $produk) {
                                                    if ($data['id'] == $produk->id) {
                                                        $produk_id = $produk->id;
                                                    }
                                                }
                                                foreach ($cart as $data) {
                                                    if ($data['id'] == $produk_id) {
                                                        $itemqty = $data['qty'];
                                                    }
                                                }
                                            @endphp
                                            <input type="hidden" name="produk_id" value="{{ $produk_id }}">
                                            <button type="submit" class="form-control col-md-12 mt-1 btn btn-outline-warning btn-sm">Remove Item</button>
                                        </form>
                                        <form method="post" action="{{ route('checkout.editquantity') }}">
                                            @csrf
                                            <input type="hidden" name="produk_id" value="{{ $produk_id }}">
                                            <input type="number" class="form-control col-md-12 mt-1" name="quantity" value="{{ $itemqty }}">
                                            <button type="submit" class="form-control col-md-12 mt-1 btn btn-outline-secondary btn-sm">Edit Quantity</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <th colspan="4">Total</th>
                                <th colspan="4">{{ \Gloudemans\Shoppingcart\Facades\Cart::priceTotal() }}</th>
                            </tr>
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

