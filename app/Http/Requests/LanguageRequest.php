<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LanguageRequest extends FormRequest
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
            'artranslateactive' => [ 'required|string|max:255', Rule::in([ 'active', 'notactive' ])], 
            'entranslateactive' => [ 'required|string|max:255', Rule::in([ 'active', 'notactive' ])], 
            'frtranslateactive' => [ 'required|string|max:255', Rule::in([ 'active', 'notactive' ])], 
            'chtranslateactive' => [ 'required|string|max:255', Rule::in([ 'active', 'notactive' ])], 
            'grtranslateactive' => [ 'required|string|max:255', Rule::in([ 'active', 'notactive' ])]
        ];
    }
}
