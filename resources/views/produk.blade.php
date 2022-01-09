<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="Nama">Nama Produk</label>
                                <input type="text" class="form-control" id="Nama" name="nama" placeholder="Nama Produk" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="Kategori">Kategori</label>
                                <select class="custom-select" id="Kategori" name="kategori">
                                    <option value="Obat">Obat</option>
                                    <option value="Non Obat">Non Obat</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="Pabrikan">Pabrikan</label>
                                <input type="text" class="form-control" id="Pabrikan" name="pabrikan" placeholder="Pabrikan" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="TanggalProduksi">Tanggal Produksi</label>
                                <input type="date" class="form-control" id="TanggalProduksi" name="tanggalproduksi" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="TanggalKedaluwarsa">Tanggal Kedaluwarsa</label>
                                <input type="date" class="form-control" id="TanggalKedaluwarsa" name="tanggalkedaluwarsa" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="Harga">Harga</label>
                                <input type="number" class="form-control" id="Harga" name="harga" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="JumlahStok">Jumlah Stok</label>
                                <input type="number" class="form-control" id="JumlahStok" name="jumlahstok" required>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
