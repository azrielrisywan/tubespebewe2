<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class KaryawanController extends Controller
{
    public function store(Request $request) {

        $request->validate([
            'nama' => 'required',
            'noHP' => 'required|numeric',
            'masaKontrak' => 'required|date',
            'shift' => 'required',
        ],[
            'nama.required' => 'Nama harus diisi!',
            'noHP.required' => 'No. HP harus diisi',
            'noHP.numeric' => 'No. HP harus berupa angka',
            'masaKontrak.required' => 'Masa Kontrak harus diisi!',
            'masaKontrak.date' => 'Masa Kontrak harus berupa "date"',
            'shift.required' => 'Shift harus diisi!',
        ]);

        try {
            DB::table('karyawan')->insert([
                'nama' => $request->nama,
                'kontak' => $request->noHP,
                'masa_kontrak' => $request->masaKontrak,
                'shift_id' => $request->shift,
            ]);
            toast('Data berhasil dimasukkan!', 'success');
            return back();
        } catch (Exception $e) {
            Alert::error('Error', $e->getMessage());
            return back();
        }
    }
}
