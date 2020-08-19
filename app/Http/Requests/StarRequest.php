<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StarRequest extends FormRequest
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
            'nom' => 'required|string|max:100|min:2',
            'prenom' => 'required|string|max:100|min:2',
            'description' => 'required|string|min:2',
            'photo' => 'required|file|mimes:jpeg,bmp,png,jpg',
        ];
    }
}
