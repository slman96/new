<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class userUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if ($this->user()->can('update')){return true;};
        return false;
    }

    
    public function rules(): array
    {
        return [
            'role'=> ['required', 'string', 'max:255'],
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'string|max:10|unique:users',
            'email' => 'required|string|max:255|unique:users'
        ];
    }
}
