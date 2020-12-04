<?php


namespace App\Http\Request;


use Urameshibr\Requests\FormRequest;

class CreateJamaahRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "nama" => "required",
            "nik" => "required",
            "jenis_kelamin" => "required",
            "tempat_lahir" => "required",
            "tanggal_lahir" => "required",
            "hp" => "required|size:12",
            "alamat" => "required",
            "users_id" => "required",
            "kelompok" => "required",
            "kategori_jamaah" => "required",
            "status_jamaah" => "required",
            "provinsi" => "required",
            "kab" => "required",
            "kec" => "required",
            "kel" => "required",
        ];
    }
}
