<?php

namespace App\Http\Requests\StoreRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' =>'required|string',
            'address' =>'required|string',
            'logo' =>'required',
        ];
    }

    public function messages(){
        return [
            'name.required' =>'Name is required.',
            'name.string' =>'Name must be a string.',
            'address.required' =>'Address is required.',
            'address.string' =>'Address must be a string.',
            'logo.required' =>'Logo is required.',
        ];
    }
}
