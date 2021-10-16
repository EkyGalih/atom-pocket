<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DompetValidasi extends FormRequest
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
            'nama' => 'required|min:5',
            'deskripsi' => 'max:100'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute harus diisi',
            'max' => ':attribute maximal :max karakter',
            'min' => ':attribute minimal :min karakter'
        ];
    }

    public function attributes()
    {
        return [
            'nama' => 'Nama',
            'deskripsi' => 'Deskripsi'
        ];
    }
}
