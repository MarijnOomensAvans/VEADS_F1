<?php

namespace App\Http\Requests\Wizard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class WizardInstagramRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !Storage::has('installed');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'insta_client_id' => 'required',
            'insta_client_secret' => 'required'
        ];
    }
}
