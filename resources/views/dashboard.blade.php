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
                        <table class="table table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kontak</th>
                                <th scope="col">Masa Kontrak</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($karyawans as $karyawan)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{$karyawan['nama']}}</td>
                                <td>{{$karyawan['kontak']}}</td>
                                <td>{{$karyawan['masa_kontrak']}}</td>
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
                                <th scope="col">Nama</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Produser</th>
                                <th scope="col">Produksi</th>
                                <th scope="col">Kadaluarsa</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Stok</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>*id</td>
                                <td>*nama</td>
                                <td>*kategori</td>
                                <td>produser</td>
                                <td>*produksi</td>
                                <td>*kadaluarsa</td>
                                <td>*harga</td>
                                <td>*stok</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>*id1</td>
                                <td>*nama1</td>
                                <td>*kategori1</td>
                                <td>produser1</td>
                                <td>*produksi1</td>
                                <td>*kadaluarsa1</td>
                                <td>*harga1</td>
                                <td>*stok1</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>*id</td>
                                <td>*nama2</td>
                                <td>*kategori2</td>
                                <td>produser2</td>
                                <td>*produksi2</td>
                                <td>*kadaluarsa2</td>
                                <td>*harga2</td>
                                <td>*stok2</td>
                            </tr>
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
