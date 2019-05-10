<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Factory;

class StoreVeadsRequestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !Auth::guest() && Auth::user()->admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type' => 'required|in:product,service,vacancy',
            'title' => 'required|max:191',
            'amount' => 'sometimes|numeric',
            'description' => 'sometimes',
            'project_id' => 'sometimes|exists_or_null:projects,id'
        ];
    }

    public function validator(Factory $factory)
    {
        $validator = $factory->make($this->input(), $this->rules());

        if ($this->request->get('type') === 'vacancy') {
            $validator->addRules(
                [
                    'event_id' => 'required|exists:events,id',
                ]
            );
        } else {
            $validator->addRules(
                [
                    'event_id' => 'sometimes|exists_or_null:events,id',
                ]
            );
        }

        return $validator;
    }
}
