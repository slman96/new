<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if ($this->user()->can('create')){return true;};
        return false;
    }

   
    public function rules(): array
    {
        return [
            'user_id' => 'required|string',
            'caption' => 'required|string',
            'discription' => 'required|string',
            'image' =>'required'
        ];
    }
}
