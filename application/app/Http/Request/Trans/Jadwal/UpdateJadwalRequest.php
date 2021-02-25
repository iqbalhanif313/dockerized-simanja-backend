<?php


namespace App\Http\Request\Trans\Jadwal;


use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

class UpdateJadwalRequest extends FormRequest
{
    public $validator = null;

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'tanggal' => 'bail|required',
            'jam_mulai' => 'bail|required',
            'jam_selesai' => 'bail|required',
            'md_kegiatan_id' => 'bail|required'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
    }
}
