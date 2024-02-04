<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>['require','min:8'],
            'description'=>['require','min:8'],
            'surface'=>['require','integer','min:10'],
            'rooms'=>['require','integer','min:1'],
            'bedrooms'=>['require','integer','min:0'],
            'floor'=>['require','integer','min:0'],
            'price'=>['require','integer','min:0'],
            'city'=>['require','min:8'],
            'address'=>['require','min:8'],
            'postal_code'=>['require','min:8'],
            'sold'=>['require','boolean']
        ];
    }
}
