<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonneFormRequest extends FormRequest
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
            'nom'                 => 'required|string|min:3',
            'prenom'              => 'required|string',
            'identity'            => 'sometimes|max:1000||mimes:jpeg,png,jpg',
            'image_justificative' => 'sometimes|max:1000||mimes:jpeg,png,jpg',
        ];
    }
}
