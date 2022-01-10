<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TambahProdukRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama' => 'min:6|required',
            'kategori' => 'required',
            'pabrikan' => 'required',
            'tanggalproduksi' => 'required|date',
            'tanggalkedaluwarsa' => 'required|date',
            'harga' => 'required|int',
            'jumlahstok' => 'required|int'
        ];
    }
}
