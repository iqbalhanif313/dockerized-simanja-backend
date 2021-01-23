<?php


namespace App\Http\Request;


use App\Models\Kecamatan;
use Urameshibr\Requests\FormRequest;

class UpdateKecamatanRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "id" => "required|exists:".Kecamatan::TABLE_NAME.",id",
            "nama" => "required",
            "st_kab_id" => "required"
        ];
    }

    public function messages()
    {
        return [
            'id.exists' => 'Kecamatan tidak ditemukan',
        ];
    }

}
