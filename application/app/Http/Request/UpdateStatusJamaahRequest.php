<?php


namespace App\Http\Request;


use App\Models\StatusJamaah;
use Urameshibr\Requests\FormRequest;

class UpdateStatusJamaahRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "id" => "required|exists:".StatusJamaah::TABLE_NAME.",id",
            "nama" => "required",
        ];
    }

    public function messages()
    {
        return [
            'id.exists' => 'Status Jamaah tidak ditemukan',
        ];
    }

}
