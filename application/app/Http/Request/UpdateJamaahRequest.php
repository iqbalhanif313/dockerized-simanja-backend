<?php


namespace App\Http\Request;


use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

class UpdateJamaahRequest extends FormRequest
{
    public $validator = null;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "nama" => "bail|required",
            "nik" => "bail|required",
            "jenis_kelamin" => "bail|required",
            "tempat_lahir" => "bail|required",
            "tanggal_lahir" => "bail|required",
            "hp" => "bail|required",
            "alamat" => "bail|required",
            "md_kelompok_id" => "bail|required",
            "st_provinsi_id" => "bail|required",
            "st_kab_id" => "bail|required",
            "st_kec_id" => "bail|required",
            "st_kel_id" => "bail|required",
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
    }
}
