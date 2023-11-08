<?php

namespace App\Http\Requests\GuruBK;

use Illuminate\Foundation\Http\FormRequest;

class profilUpdateRequest extends FormRequest
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
            'nama' => 'required',
            'jeniskelamin' => 'required',
            'tanggallahir' => 'required',
            'password' => 'confirmed|nullable',
        ];
    }
}
