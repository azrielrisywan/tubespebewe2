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
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="noHP">No. HP</label>
                                <input type="tel" class="form-control" id="noHP" name="noHP" placeholder="No. HP">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="masaKontrak">Masa Kontrak Habis</label>
                                <input type="date" class="form-control" id="masaKontrak" name="masaKontrak">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="shift">Shift</label>
                                <select class="custom-select" id="shift" name="shift">
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
