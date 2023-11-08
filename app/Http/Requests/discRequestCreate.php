<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class discRequestCreate extends FormRequest
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
            'pilihan_a' => 'required',
            'keymost_a' => 'required',
            'keylest_a' => 'required',
            'pilihan_b' => 'required',
            'keymost_b' => 'required',
            'keylest_b' => 'required',
            'pilihan_c' => 'required',
            'keymost_c' => 'required',
            'keylest_c' => 'required',
            'pilihan_d' => 'required',
            'keymost_d' => 'required',
            'keylest_d' => 'required',
        ];
    }
}
