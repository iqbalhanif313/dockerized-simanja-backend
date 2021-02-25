<?php


namespace App\Http\Request\Setup\Kelurahan;


use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

class UpdateKelurahanRequest extends FormRequest
{
    public $validator = null;

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'id' => 'bail|required',
            'nama' => 'bail|required',
            'st_kec_id' => 'bail|required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
    }
}
