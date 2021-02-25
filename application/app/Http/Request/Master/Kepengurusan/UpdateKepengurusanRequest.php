<?php


namespace App\Http\Request\Master\Kepengurusan;


use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

class UpdateKepengurusanRequest extends FormRequest
{
    public $validator = null;

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'id' => 'bail|required',
            'nama' => 'bail|required|max:255',
            'st_kepengurusan_id' => 'bail|required',
            'st_level_id' => 'bail|required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
    }
}
