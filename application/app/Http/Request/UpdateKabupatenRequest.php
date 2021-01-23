<?php


namespace App\Http\Request;


use App\Models\Kabupaten;
use Urameshibr\Requests\FormRequest;

class UpdateKabupatenRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "id" => "required|exists:".Kabupaten::TABLE_NAME.",id",
            "nama" => "required",
            "st_provinsi_id" => "required",
        ];
    }

    public function messages()
    {
        return [
            'id.exists' => 'Kabupaten tidak ditemukan',
        ];
    }

}
