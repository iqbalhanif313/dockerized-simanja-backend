<?php


namespace App\Http\Request\Setup;


use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

class BaseUpdateSetupRequest extends FormRequest
{
    public $validator = null;

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'id' => 'bail|required',
            'nama' => 'bail|required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
    }
}
