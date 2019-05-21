<?php

namespace App\Http\Requests\Wizard;

use Illuminate\Contracts\Validation\Factory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use PHPMailer\PHPMailer\PHPMailer;

class WizardMailRequest extends FormRequest
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
            'mail_driver' => 'required|in:smtp,sendmail',
            'mail_host' => 'required_if:mail_driver,smtp',
            'mail_port' => 'required_if:mail_driver,smtp',
            'mail_username' => 'sometimes',
            'mail_password' => 'sometimes',
            'mail_encryption' => 'sometimes',
            'mail_from_address' => 'required|email',
            'mail_from_name' => 'required'
        ];
    }

    public function validator(Factory $factory)
    {
        $validator = $factory->make($this->input(), $this->rules());

        $data = $this->all();

        $validator->after(function($validator) use ($data) {
            if (
                !empty($data['mail_driver']) &&
                $data['mail_driver'] == 'smtp' &&
                !empty($data['mail_host']) &&
                !empty($data['mail_port'])
            ) {
                // Test smtp connection

                $mail = new PHPMailer(true);
                $mail->SMTPSecure = $data['mail_encryption'] ?? '';
                $mail->Username = $data['mail_username'] ?? '';
                $mail->Password = $data['mail_password'] ?? '';
                $mail->Port = (int) $data['mail_port'];
                $mail->Host = $data['mail_host'];
                $mail->From = $data['mail_from_address'];
                $mail->FromName = $data['mail_from_name'];

                if (!empty($data['mail_username']) || !empty($data['mail_password'])) {
                    $mail->SMTPAuth = true;
                }

                try {
                    $valid = $mail->smtpConnect();

                    if (!$valid) {
                        throw new \Exception();
                    }
                } catch (\Exception $error_exception) {
                    $validator->errors()->add('mail_error',  'Het is niet mogelijk om een verbinding tot stand te brengen met de smtp server. Controleer de gegevens en probeer het opnieuw.');
                    return $validator;
                }

                return $validator;
            }
        });

        return $validator;
    }
}
