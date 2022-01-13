<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @php
                        $id = 0;
                        $nama = '';
                        $noHp = '';
                        $masaKontrak = '';
                        $shift = '';
                        foreach ($nama_karyawan as $data) {
                            $nama = $data->nama;
                        }
                        foreach ($karyawans as $karyawan) {
                            $id = $karyawan->id;
                            $noHp = $karyawan->kontak;
                            $masaKontrak = $karyawan->masa_kontrak;
                            $shift = $karyawan->waktu_kerja;
                        }
                    @endphp
                    <form method="post" action="{{ url('/updateKaryawan/'.$id) }}">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ $nama }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="noHP">No. HP</label>
                                <input type="tel" class="form-control" id="noHP" name="noHP" placeholder="No. HP" value="{{ $noHp }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="masaKontrak">Masa Kontrak Habis</label>
                                <input type="date" class="form-control" id="masaKontrak" name="masaKontrak" value="{{ $masaKontrak }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="shift">Shift</label>
                                <select class="custom-select" id="shift" name="shift">
                                    <option value="1">Malam Weekday</option>
                                    <option value="2">Siang Weekday</option>
                                    <option value="3">Malam Weekend</option>
                                    <option value="3">Siang Weekend</option>
                                </select>
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
                                    <td>{{$karyawan->waktu_kerja}}</td>
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


