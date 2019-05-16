<?php

namespace App\Http\Requests;

use Carbon\Carbon;
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
            'name' => 'max:50',
	        'description' => '',
            'tags' => 'regex:/[^,\s]+/',
	        'price' => 'numeric|max:9999.99',
	        'street' => 'max:50|required_with_all:number,zipcode,city,country|nullable',
	        'number' => 'numeric|nullable|required_with_all:street,zipcode,city,country',
	        'number_modifier' => 'max:5|nullable',
	        'zipcode' => 'required_with_all:street,number,city,country|nullable',
	        'city' => 'required_with_all:street,number,zipcode,country|nullable',
	        'country' => 'required_with_all:street,number,zipcode,city|nullable',
	        'start_datetime' => 'date',
            'end_datetime' => 'date|after_or_equal:start_datetime',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'project_id' => 'numeric|min:0',
            'published' => 'boolean'
        ];
    }

    protected function getValidatorInstance()
    {
        $data = $this->all();

        if (isset($data['start_date']) && !empty($data['start_date'])) {
            $date_str = $data['start_date'];

            if (isset($data['start_time']) && !empty($data['start_time'])) {
                $date_str .= " " . $data['start_time'];
            }

            $data["start_datetime"] = new Carbon($date_str);
        }

        if (isset($data['end_date']) && !empty($data['end_date'])) {
            $date_str = $data['end_date'];

            if (isset($data['end_time']) && !empty($data['end_time'])) {
                $date_str .= " " . $data['end_time'];
            }

            $data["end_datetime"] = new Carbon($date_str);
        }

        $this->getInputSource()->replace($data);

        return parent::getValidatorInstance();
    }
}
