<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-validation-errors class="mb-4" :errors="$errors" />
                    @foreach($obats as $obat)
                    <form action="{{ route('updatedataObat',$obat->id)  }}" method="POST" >
                    @endforeach
                    @csrf
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="nama">Nama</label>
                                @foreach($obats as $obat)
                                <input type="text" class="form-control" value="{{ $obat -> nama }}" id="nama" name="nama" placeholder="Nama">
                                @endforeach
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="harga">Harga</label>
                                @foreach($obats as $obat)
                                <input type="text" class="form-control" value="{{ $obat -> harga }}" id="harga" name="harga" placeholder="harga">
                                @endforeach
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="pabrikan">Pabrikan</label>
                                @foreach($obats as $obat)
                                <input type="text" class="form-control" value="{{ $obat -> pabrikan }}" id="pabrikan" name="pabrikan" placeholder="pabrikan">
                                @endforeach
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="jumlah_stok">Jumlah Stok</label>
                                @foreach($obats as $obat)
                                <input type="text" class="form-control" value="{{ $obat -> jumlah_stok }}" id="jumlah_stok" name="jumlah_stok" placeholder="jumlah_stok">
                                @endforeach
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="category">Kategori</label>
                                @foreach($obats as $obat)
                                <select class="custom-select" id="category" name="category">
                                    <option value="Obat">Obat</option>
                                    <option value="Non Obat">Non Obat</option>
                                </select>
                            @endforeach
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="tanggal">Tanggal Produksi</label>
                                @foreach($obats as $obat)
                                <input type="date" class="form-control" value="{{ $obat -> tanggal_produksi }}" id="tanggal" name="tanggal">
                                @endforeach
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="tanggal_kedaluwarsa">Tanggal Produksi</label>
                                @foreach($obats as $obat)
                                <input type="date" class="form-control" value="{{ $obat -> tanggal_kedaluwarsa }}" id="tanggal_kedaluwarsa" name="tanggal_kedaluwarsa">
                                @endforeach
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Edit Data</button>
                    </form>
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
                                <th scope="col">Nama</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah Stok</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Pabrikan</th>
                                <th scope="col">Tanggal Produksi</th>
                                <th scope="col">Tanggal Kadaluarsa</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($obats as $obat)
                                <tr>
                                    <td>{{$obat->nama}}</td>
                                    <td>{{$obat->harga}}</td>
                                    <td>{{$obat->jumlah_stok}}</td>
                                    <td>{{$obat->kategori}}</td>
                                    <td>{{$obat->pabrikan}}</td>
                                    <td>{{$obat->tanggal_produksi}}</td>
                                    <td>{{$obat->tanggal_kedaluwarsa}}</td>
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
