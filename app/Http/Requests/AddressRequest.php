<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'city' => 'required|string|max:255', 
            'address2' => 'required|string|max:255', 
            'district' => 'required|string|max:255', 
            'street' => 'required|string|max:255', 
            'building' => 'required|string|max:255', 
            'googleearthlocation' => 'required|string|max:255', 
            'phone' => 'required|string|max:255|unique:addresses', 
            'telephone' => 'required|string|max:255|unique:addresses', 
            'postalcode' => 'required|string|max:255|unique:addresses'
        ];
    }
}
