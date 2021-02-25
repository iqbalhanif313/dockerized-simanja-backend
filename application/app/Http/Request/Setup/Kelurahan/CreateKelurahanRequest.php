<?php


namespace App\Http\Request\Setup\Kelurahan;


use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

class CreateKelurahanRequest extends FormRequest
{
    public $validator = null;

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'id' => 'required',
            'nama' => 'required',
            'st_kec_id' => 'required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
    }
}
