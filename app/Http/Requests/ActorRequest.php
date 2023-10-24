<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ActorRequest extends FormRequest
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
            'agentname' => 'required|string|max:255', 
            'actorphonenumber' => 'required|string|max:255|unique:actors', 
            'actortelephone'=> 'required|string|max:255|unique:actors', 
            'gmail' => 'required|string|max:255|unique:actors', 
            'active' => [ 'required|string|max:255', Rule::in([ 'active', 'notactive' ])]
        ];
    }
}
