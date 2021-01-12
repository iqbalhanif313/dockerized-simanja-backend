<?php


namespace App\Http\Request;


use App\Models\JenisKegiatan;
use Urameshibr\Requests\FormRequest;

class UpdateJenisKegiatanRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "id" => "required|exists:". JenisKegiatan::TABLE_NAME.",id",
            "nama" => "required",
        ];
    }

    public function messages()
    {
        return [
            'id.exists' => 'Jenis Kegiatan tidak ditemukan',
        ];
    }

}
