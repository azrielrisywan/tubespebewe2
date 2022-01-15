<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}

        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="table-responsive">
                        <p class="h2">Karyawan</p>
                        <table class="mt-4 table table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Kontak</th>
                                <th scope="col">Kontrak Habis</th>
                                <th scope="col">Shift</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($karyawans as $karyawan)
                            <tr>
                                <td>{{$karyawan->nama}}</td>
                                <td>{{$karyawan->kontak}}</td>
                                <td>{{$karyawan->masa_kontrak}}</td>
                                @if ($karyawan->shift_id == 1)
                                <td>Pagi</td>
                                @elseif($karyawan->shift_id == 2)
                                    <td>Siang</td>
                                @elseif($karyawan->shift_id == 3)
                                    <td>Malam</td>
                                @endif
                                <td><a href="{{ url('/editKaryawan/'.$karyawan->id) }}" >Edit</a>  | <a href="{{ url('/hapusKaryawan/'.$karyawan->id) }}" >Hapus</a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="table-responsive">
                        <p class="h2">Produk</p>
                        <table class="mt-4 table table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Manufacturer</th>
                                <th scope="col">Tanggal Produksi</th>
                                <th scope="col">Kadaluarsa</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Stok</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($produks as $produk)
                                <tr>
                                    <td>{{$produk->id}}</td>
                                    <td>{{$produk->nama}}</td>
                                    <td>{{$produk->kategori}}</td>
                                    <td>{{$produk->pabrikan}}</td>
                                    <td>{{$produk->tanggal_produksi}}</td>
                                    <td>{{$produk->tanggal_kedaluwarsa}}</td>
                                    <td>{{$produk->harga}}</td>
                                    <td>{{$produk->jumlah_stok}}</td>
                                    <td><a href="{{ url('/editObat/'.$produk->id) }}" >Edit</a>  | <a href="{{ url('/hapusObat/'.$produk->id) }}" >Hapus</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="table-responsive">
                        <p class="h2">Transaksi</p>
                        <table class="table table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col-md-1">Id</th>
                                <th scope="col">Tanggal Order</th>
                                <th scope="col">Metode Pembayaran</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Jumlah</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transaksi as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->tanggal_order }}</td>
                                    <td>{{ $data->metode_pembayaran }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->jumlah }}</td>
                                </tr>

                            @endforeach
                            {{ $transaksi->onEachSide(5)->links() }}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
