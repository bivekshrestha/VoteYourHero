<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HeroRequest extends FormRequest
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
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'country_id' => 'required',
            'profession' => 'required|min:2',
            'identity' => 'required|min:2',
            'contribution' => 'required|min:8',
            'photo' => 'required|image',
        ];
    }
}
