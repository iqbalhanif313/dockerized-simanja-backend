<?php


namespace App\Helpers;


class ServiceHelper
{
    public static function result($status, $message, $data = null) {
        return (object)[
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];
    }
}
