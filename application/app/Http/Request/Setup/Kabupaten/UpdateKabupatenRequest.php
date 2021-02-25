<?php


namespace App\Http\Request\Setup\Kabupaten;


use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

class UpdateKabupatenRequest extends FormRequest
{
    public $validator = null;

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'id' => 'bail|required',
            'nama' => 'bail|required',
            'st_provinsi_id' => 'bail|required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
    }
}
