<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class OwnerUpdateValidation extends FormRequest
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

            'first_name'=>'required',
            'last_name'=>'required',
            'email' => [
            'required',
            Rule::unique('owners', 'email')->ignore($this->owner->id)
            ],
            'mobile' => [
            'required',
            Rule::unique('owners', 'mobile')->ignore($this->owner->id)
            ],
            'restaurant_name' => ['required', '', '', '']
            ];
    }
}
