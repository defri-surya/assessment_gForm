<?php

namespace App\Http\Requests\Superadmin;

use Illuminate\Foundation\Http\FormRequest;

class rumusRequest extends FormRequest
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
            'nilai' => 'required',
            'D' => 'required',
            'I' => 'required',
            'S' => 'required',
            'C' => 'required',
        ];
    }
}
