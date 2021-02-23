<?php


namespace App\Http\Request\Master\Kegiatan;


use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

class CreateKegiatanRequest extends FormRequest
{
    public $validator = null;

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'deskripsi' => 'required',
            'st_level_id' => 'required',
            'st_jenis_kegiatan_id' => 'required',
            'st_kategori_jamaah_id' => 'required',
            'st_desa_id' => 'required',
            'md_kelompok_id' => 'required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
    }
}
