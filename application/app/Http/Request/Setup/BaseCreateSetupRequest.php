<?php


namespace App\Http\Request\Setup;


use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

class BaseCreateSetupRequest extends FormRequest
{
    public $validator = null;

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'id' => 'required',
            'nama' => 'required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
    }
}
