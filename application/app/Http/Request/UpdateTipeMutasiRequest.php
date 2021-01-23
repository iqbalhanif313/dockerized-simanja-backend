<?php


namespace App\Http\Request;


use App\Models\TipeMutasi;
use Urameshibr\Requests\FormRequest;

class UpdateTipeMutasiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "id" => "required|exists:".TipeMutasi::TABLE_NAME.",id",
            "nama" => "required",
        ];
    }

    public function messages()
    {
        return [
            'id.exists' => 'TipeMutasi tidak ditemukan',
        ];
    }

}
