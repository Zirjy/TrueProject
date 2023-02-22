<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SiswaRequest extends FormRequest
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
        $rute_siswa_unique = Rule::unique('siswas', 'siswa');
        if ($this -> method() !== 'POST'){
            $rute_siswa_unique -> ignore($this->route()->parameter('id'));
        }

        return [
            'siswa' => ['required', $rute_siswa_unique],
            'user' => ['required']
        ];
    }
    public function messages()
    {
        return[
            'required' => 'islam :attribute harus diisi', 
            'user.required' => 'nama pengguna harus diisi'
        ];
    }
}
