<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDonationRequest extends FormRequest
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
            'amount' => 'numeric|required',
            'first_name' => 'nullable|string|max:50|',
            'last_name' => 'nullable|string|max:75',
            'email' => 'nullable|email',
            'event_id' => 'nullable|numeric|exists:events,id'
        ];
    }
}
