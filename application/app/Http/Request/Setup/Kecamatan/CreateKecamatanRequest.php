<?php


namespace App\Http\Request\Setup\Kecamatan;


use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

class CreateKecamatanRequest extends FormRequest
{
    public $validator = null;

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'id' => 'required',
            'nama' => 'required',
            'st_kab_id' => 'required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
    }
}
