<?php


namespace App\Http\Request;


use App\Models\KategoriJamaah;
use Urameshibr\Requests\FormRequest;

class UpdateKategoriJamaahRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "id" => "required|exists:".KategoriJamaah::TABLE_NAME.",id",
            "nama" => "required",
        ];
    }

    public function messages()
    {
        return [
            'id.exists' => 'Kategori Jamaah tidak ditemukan',
        ];
    }

}
