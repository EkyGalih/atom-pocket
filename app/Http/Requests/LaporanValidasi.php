<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LaporanValidasi extends FormRequest
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
            'tgl_awal' => 'required',
            'tgl_akhir' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute harus diisi'
        ];
    }

    public function attributes()
    {
        return [
            'tgl_awal' => 'Tanggal Awal',
            'tgl_akhir' => 'Tanggal Akhir'
        ];
    }
}
