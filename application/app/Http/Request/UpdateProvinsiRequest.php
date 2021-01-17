<?php


namespace App\Http\Request;


use App\Models\Provinsi;
use Urameshibr\Requests\FormRequest;

class UpdateProvinsiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "id" => "required|exists:".Provinsi::TABLE_NAME.",id",
            "nama" => "required",
        ];
    }

    public function messages()
    {
        return [
            'id.exists' => 'Provinsi tidak ditemukan',
        ];
    }

}
