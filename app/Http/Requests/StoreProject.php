<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreProject extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !Auth::guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:50',
            'description' => 'nullable',
            'street' => 'max:50|required_with:number,zipcode,city',
            'number' => 'required_with:street,zipcode,city',
            'number_modifier' => 'max:5',
            'zipcode' => 'required_with:street,number,city',
            'city' => 'required_with:street,number,zipcode',
            'country' => 'required_with:street,number,zipcode,city'
        ];
    }
}
