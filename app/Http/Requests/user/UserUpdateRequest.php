<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'country'=> ['string', 'max:255'],
            'image'=> [''],
            'address' => ['required'],
            'latitude' => [''],
            'longitude' => [''],
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone_number' => 'required',
            'email' => 'required|string|max:255',
        ];
    }
}
