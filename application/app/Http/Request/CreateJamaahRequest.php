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
            "hp" => "required",
            "alamat" => "required",
            "users_id" => "required",
            "md_kelompok_id" => "required",
            "st_provinsi_id" => "required",
            "st_kab_id" => "required",
            "st_kec_id" => "required",
            "st_kel_id" => "required",
        ];
    }
}
