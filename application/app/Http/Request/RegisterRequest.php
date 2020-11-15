<?php


namespace App\Http\Request;


use Urameshibr\Requests\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "email"=>"required|email|unique:user",
            "password"=>"required|confirmed"
        ];
    }
}
