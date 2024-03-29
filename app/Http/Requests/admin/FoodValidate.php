<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class FoodValidate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'food_name'=>'required',
            'short_description'=>'required',
            'long_description'=>'required',
            'image'=>'required',
            'restaurant_id'=>'required',
            'category_id'=>'required',
            
        ];
    }

    public function messages()
    {
        return [
            'food_name.required'=>'Please Enter Food Name',
            'short_description.required'=>'Please Enter short description',
            'long_description.required'=>'Please Enter long description',
            'image.required'=>'Please select image',
            'restaurant_id.required'=>'Please select Restaurant',
            'category_id.required'=>'Please select Category',
        ];
    }
}
