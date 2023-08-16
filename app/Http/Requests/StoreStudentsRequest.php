<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => "required|min:5",
            'address' => "required|min:5|max:200",
            'gender' => "required",
            'class' => "required|min:3",
            'age' => "required",
            'phone' => "required|min:10|max:20",
            'email' => "required|email|max:50",
        ];
    }
}