<?php

namespace App\Http\Requests\ProductRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProductRequest extends FormRequest
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
            'description' =>'required|string',
            'base_price'=>'required|numeric',
            'discount_price'=>'required|numeric',
            'store_id'=>'required|numeric|min:1',
            'photo'=>'required'
        ];
    }

    public function messages(){
        return [
            'name.required' =>'Name is required.',
            'name.string' =>'Name must be a string.',
            'description.required' =>'Description is required.',
            'description.string' =>'Description must be a string.',
            'base_price.required' =>'Original price is required.',
            'base_price.numeric' =>'The field of original price a number.',
            'discount_price.required' =>'Discount price is required.',
            'discount_price.numeric' =>'The field of discount price a number.',
            'store_id.required' =>'You must choose a store.',
            'store_id.numeric' =>'The field of store id a number.',
            'store_id.min:1' =>'Wrong value of store id selected.',
            'photo.required' =>'Image is required.',
        ];
    }
}
