<?php


namespace App\Http\Request;


use Urameshibr\Requests\FormRequest;

class CreateJenisKegiatanRequest extends FormRequest
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
