<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMuridRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'NIK' => 'required|unique:murids,NIK|min:16|max:16',
            'NamaLengkap' => 'required',
            'JenisKelamin' => 'required',
            'Alamat' => 'required',
            'NoHp' => 'required|numeric' 
        ];
    }

    public function messages(): array
{
    return [
        'NIK.required' => ':attribute Tidak Boleh Kosong',
        'NIK.unique' => ':attribute Sudah Ada di Dalam Tabel ',
        'NamaLengkap.required' => ':attribute Tidak Boleh Kosong',
        'Alamat.required' => ':attribute Tidak Boleh Kosong',
        'NoHp.required' => ':attribute Tidak Boleh Kosong',
        'NoHp.unique' => ':attribute Tidak Boleh Sama',
    ];
}
    public function attributes(): array
{
    return [
        'NIK' => 'NIK',
        'NamaLengkap' => 'Nama Lengkap',
        'Alamat' => 'Alamat',
        'NoHp' => 'No Hp',
    ];
}

}
