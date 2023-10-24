<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
            'name' => 'required|string|max:255', 
            'managerfirstname' => 'required|string|max:255', 
            'managerlastname' => 'required|string|max:255', 
            'managerphone' => 'required|string|max:255', 
            'type' => 'required|string|max:255', 
            'active' => [ 'required|string|max:255', Rule::in([ 'active', 'notactive' ])]
        ];
    }
}
