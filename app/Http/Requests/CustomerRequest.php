<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
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
            'firstname' => 'required|string|max:255', 
            'lastname' => 'required|string|max:255', 
            'address' => 'required|string|max:255', 
            'email' => 'required|string|max:255|unique:customers', 
            'phonenumber' => 'required|string|max:255|unique:customers', 
            'telephone' => 'required|string|max:255|unique:customers', 
            'active' => [ 'required|string|max:255', Rule::in([ 'active', 'notactive' ])]
        ];
    }
}
