<?php


namespace App\Http\Request\Master\Kegiatan;


use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

class UpdateKegiatanRequest extends FormRequest
{
    public $validator = null;

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'deskripsi' => 'bail|required',
            'st_level_id' => 'bail|required',
            'st_jenis_kegiatan_id' => 'bail|required',
            'st_kategori_jamaah_id' => 'bail|required',
            'st_desa_id' => 'bail|required',
            'md_kelompok_id' => 'bail|required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
    }
}
