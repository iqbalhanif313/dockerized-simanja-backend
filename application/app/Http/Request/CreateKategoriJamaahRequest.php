<?php


namespace App\Http\Request;


use Urameshibr\Requests\FormRequest;

class CreateKategoriJamaahRequest extends FormRequest
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
