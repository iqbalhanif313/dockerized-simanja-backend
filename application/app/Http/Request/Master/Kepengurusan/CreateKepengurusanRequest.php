<?php


namespace App\Http\Request\Master\Kepengurusan;


use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

class CreateKepengurusanRequest extends FormRequest
{
    public $validator = null;

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'id' => 'required',
            'nama' => 'required|max:255',
            'st_kepengurusan_id' => 'required',
            'st_level_id' => 'required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
    }
}
