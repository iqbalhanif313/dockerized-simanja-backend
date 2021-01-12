<?php


namespace App\Http\Request;


use App\Models\Desa;
use Urameshibr\Requests\FormRequest;

class UpdateDesaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "id" => "required|exists:".Desa::TABLE_NAME.",id",
            "nama" => "required",
        ];
    }

    public function messages()
    {
        return [
            'id.exists' => 'Desa tidak ditemukan',
        ];
    }

}
