<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreEvent extends FormRequest
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
	        'description' => 'required',
	        'price' => 'numeric|max:9999.99',
	        'street' => 'required|max:50',
	        'number' => 'required|numeric',
	        'number_modifier' => 'max:5',
	        'zipcode' => 'required',
	        'city' => 'required',
	        'country' => 'required',
	        'start_date' => 'required|date',
	        'start_time' => 'required|date_format:H:i',
            'end_date' => 'required|date',
            'end_time' => 'required|date_format:H:i',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096'
        ];
    }
}
