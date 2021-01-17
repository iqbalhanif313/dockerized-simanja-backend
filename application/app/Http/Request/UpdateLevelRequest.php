<?php


namespace App\Http\Request;


use App\Models\Level;
use Urameshibr\Requests\FormRequest;

class UpdateLevelRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "id" => "required|exists:".Level::TABLE_NAME.",id",
            "nama" => "required",
        ];
    }

    public function messages()
    {
        return [
            'id.exists' => 'Level tidak ditemukan',
        ];
    }

}
