<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreVolunteer extends FormRequest
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
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|email',
            'phone_number' => 'required|max:50',
            'street' => 'required|max:50',
            'number' => 'required|numeric',
            'number_modifier' => 'max:5',
            'zipcode' => 'required',
            'city' => 'required',
            'country' => 'required'
        ];
    }
}
