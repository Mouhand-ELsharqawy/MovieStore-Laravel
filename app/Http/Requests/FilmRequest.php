<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmRequest extends FormRequest
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
            'language' => 'required|string|max:255', 
            'title' => 'required|string|max:255', 
            'desc' => 'required|string', 
            'releaseyear' => 'required|date', 
            'rentalduration' => 'required|numeric', 
            'rentalrate' => 'required|numeric', 
            'length' => 'required|numeric', 
            'replacementcost' => 'required|numeric', 
            'rating' => 'required|numeric', 
            'specialfeature' => 'required', 
            'fulltext' => 'required'
        ];
    }
}
