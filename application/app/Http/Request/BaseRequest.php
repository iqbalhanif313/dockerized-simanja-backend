<?php


namespace App\Http\Request;


use Urameshibr\Requests\FormRequest;

class BaseRequest extends FormRequest
{
    public $validator = null;
    public function __construct()
    {
        parent::__construct();
    }

}
