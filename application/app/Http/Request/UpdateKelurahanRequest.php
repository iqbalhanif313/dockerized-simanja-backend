<?php


namespace App\Http\Request;


use App\Models\Kelurahan;
use Urameshibr\Requests\FormRequest;

class UpdateKelurahanRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "id" => "required|exists:".Kelurahan::TABLE_NAME.",id",
            "nama" => "required",
            "st_kec_id" => "required"
        ];
    }

    public function messages()
    {
        return [
            'id.exists' => 'Kelurahan tidak ditemukan',
        ];
    }

}
