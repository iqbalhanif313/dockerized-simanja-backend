<?php

namespace App\Http\Controllers;

class RefController extends Controller
{

    public function getRefJenisKelamin()
    {

        $data = array(
            array('id' => 'L', 'nama' => 'Laki-laki'),
            array('id' => 'P', 'nama' => 'Perempuan'),
        );

        return response()->json($data);
    }
}
