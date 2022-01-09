<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Karyawan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationDefault01">Nama</label>
                                <input type="text" class="form-control" id="validationDefault01" placeholder="Nama" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationDefault03">No. HP</label>
                                <input type="number" class="form-control" id="validationDefault03" placeholder="No. HP" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationDefault04">Masa Kontrak Habis</label>
                                <input type="date" class="form-control" id="validationDefault04" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="shift">Shift</label>
                                <select class="custom-select" id="shift">
                                    <option selected>Choose...</option>
                                    <option value="1">Malam Weekday</option>
                                    <option value="2">Siang Weekday</option>
                                    <option value="3">Malam Weekend</option>
                                    <option value="3">Siang Weekend</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
