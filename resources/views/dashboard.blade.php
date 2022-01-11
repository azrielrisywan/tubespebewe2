

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
                                <th scope="col">Waktu Kerja</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($karyawans as $karyawan)
                            <tr>
                                <td>{{$karyawan->nama}}</td>
                                <td>{{$karyawan->kontak}}</td>
                                <td>{{$karyawan->masa_kontrak}}</td>
                                <td>{{$karyawan->waktu_kerja}}</td>
                                <td><a href="{{ url('editKaryawan') }}" >Edit</a>  | <a href="#" >Hapus</a></td>
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
                                    <td><a href="#" >Edit</a>  | <a href="#" >Hapus</a></td>
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
                        <table class="table table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Id</th>
                                <th scope="col">Tanggal Order</th>
                                <th scope="col">Metode Pembayaran</th>
                                <th scope="col">Total Bayar</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>*Id</td>
                                <td>*Tanggal Order</td>
                                <td>*Metode Pembayaran</td>
                                <td>@*Total Bayar</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>*Id1</td>
                                <td>*Tanggal Order1</td>
                                <td>*Metode Pembayaran1</td>
                                <td>@*Total Bayar1</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>*Id2</td>
                                <td>*Tanggal Order2</td>
                                <td>*Metode Pembayaran2</td>
                                <td>@*Total Bayar2</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
