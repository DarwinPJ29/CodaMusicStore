<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = isset($this->user->id) ? $this->user->id : '';
        return [
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id),
            ],
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'address' => 'required|string', // Adjust the minimum password length as needed
        ];
    }
}
