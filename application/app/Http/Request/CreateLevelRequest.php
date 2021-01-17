<?php


namespace App\Http\Request;


use Urameshibr\Requests\FormRequest;

class CreateLevelRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "id" => "required",
            "nama" => "required",
        ];
    }

}
