<?php

namespace App\Http\Requests\Wizard;

use Illuminate\Contracts\Validation\Factory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class WizardDatabaseRequest extends FormRequest
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
            'db_host' => 'required',
            'db_user' => 'required',
            'db_pass' => 'required',
            'db_port' => 'required|numeric',
            'db_name' => 'required'
        ];
    }

    public function validator(Factory $factory)
    {
        $validator = $factory->make($this->input(), $this->rules());

        $data = $this->all();

        $validator->after(function($validator) use ($data) {
            if (
                !empty($data['db_host']) &&
                !empty($data['db_user']) &&
                !empty($data['db_pass']) &&
                !empty($data['db_port']) &&
                !empty($data['db_name'])
            ) {
                // Test connection to database

                try {
                    $link = mysqli_connect($data['db_host'], $data['db_user'], $data['db_pass'], null, $data['db_port']);
                } catch (\ErrorException $error_exception) {
                    $validator->errors()->add('db_error',  'Het is niet mogelijk om een databaseverbinding tot stand te brengen met de opgegeven gegevens. Controleer de gegevens en probeer het opnieuw.');
                    return $validator;
                }

                // Test if database exists

                if (!mysqli_select_db($link, $data['db_name'])) {
                    $validator->errors()->add('db_error', 'De opgegeven database bestaat niet op de server. Controleer de gegevens en probeer het opnieuw.');
                    return $validator;
                }

                // Test if database is empty

                $tables = mysqli_fetch_array(mysqli_query($link, 'SHOW TABLES FROM ' . $data['db_name']));

                if (!is_null($tables) && count($tables) > 0) {
                    $validator->errors()->add('db_error', 'De opgegeven database is niet leeg. Maak de database leeg, of geef de naam van een lege database op.');
                    return $validator;
                }

                return $validator;
            }
        });

        return $validator;
    }
}
