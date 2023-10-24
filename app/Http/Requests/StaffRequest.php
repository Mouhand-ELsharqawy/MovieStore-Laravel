<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StaffRequest extends FormRequest
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
            'address' => 'required', 
            'store' => 'required', 
            'firstname' => 'required|string|max:255', 
            'lastname' => 'required|string|max:255', 
            'username' => 'required|string|max:255', 
            'email' => 'required|string|max:255|unique:staff', 
            'pictureurl' => 'required|string|max:255', 
            'active' => [ 'required|string|max:255', Rule::in([ 'active', 'notactive' ])]
        ];
    }
}
