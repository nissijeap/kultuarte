<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:25000',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:25000',
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'gender' => 'nullable|in:male,female',
            'birthdate' => 'nullable|date',
            'relationship' => 'nullable|in:single,married,widow',
            'address' => 'nullable|string',
            'description' => 'nullable|string',
            'email' => 'required|string|email:rfc,dns|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'roles' => 'required'
        ];
    }
}