<?php


namespace App\Http\Request\Setup\Kecamatan;


use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

class UpdateKecamatanRequest extends FormRequest
{
    public $validator = null;

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'id' => 'bail|required',
            'nama' => 'bail|required',
            'st_kab_id' => 'bail|required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
    }
}
