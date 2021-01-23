<?php


namespace App\Http\Request;


use App\Models\StatusKehadiran;
use Urameshibr\Requests\FormRequest;

class UpdateStatusKehadiranRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "id" => "required|exists:".StatusKehadiran::TABLE_NAME.",id",
            "nama" => "required",
        ];
    }

    public function messages()
    {
        return [
            'id.exists' => 'StatusKehadiran tidak ditemukan',
        ];
    }

}
