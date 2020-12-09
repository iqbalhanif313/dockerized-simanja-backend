<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{

    protected function respondWithToken($token,$profile)
    {
        $response['token'] = [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => app('auth')->factory()->getTTL() * 60
        ];
        $response['profile'] = $profile;

        return response()->json($response);
    }

    public function handleBadRequest($message){
        return response()->json([
            'error'=> true,
            'message'=>$message
        ],400);
    }

    public function handleUnauthorizedRequest($message){
        return response()->json([
            'error'=> true,
            'message'=>$message
        ],401);
    }

    public function success($message){
        return response()->json([
            'error'=>true,
            'message'=>$message
        ]);
    }

    public function data($data){
        return response()->json($data);
    }
}
