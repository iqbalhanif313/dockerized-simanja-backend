<?php


namespace App\Http\Request;


use Urameshibr\Requests\FormRequest;

class CreateDesaRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "nama" => "required",
        ];
    }

}