<?php


namespace App\Http\Request;


use Urameshibr\Requests\FormRequest;

class CreateKabupatenRequest extends FormRequest
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
            "st_provinsi_id" => "required"
        ];
    }

}
