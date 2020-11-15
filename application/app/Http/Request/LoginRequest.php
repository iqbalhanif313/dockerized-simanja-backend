<?php


namespace App\Http\Request;


use Urameshibr\Requests\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "email"=>"required|email",
            "password"=>"required"
        ];
    }
}
