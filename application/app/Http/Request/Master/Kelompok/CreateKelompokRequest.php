<?php


namespace App\Http\Request\Master\Kelompok;


use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

class CreateKelompokRequest extends FormRequest
{
    public $validator = null;

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'id' => 'required',
            'nama' => 'required|max:255',
            'st_desa_id' => 'required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
    }
}
