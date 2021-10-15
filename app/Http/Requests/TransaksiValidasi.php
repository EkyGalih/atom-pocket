<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransaksiValidasi extends FormRequest
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
            'nilai' => 'required|integer',
            'deskripsi' => 'max:100'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute harus diisi',
            'integer' => ':attribute harus menggunakan angka',
            'max' => ':attribute maximal :max karakter'
        ];
    }

    public function attributes()
    {
        return [
            'nilai' => 'Nilai',
            'deskripsi' => 'Deskripsi'
        ];
    }
}
