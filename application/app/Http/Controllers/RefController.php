<?php

namespace App\Http\Controllers;

class RefController extends Controller
{


    /**
     * Show setup kepengurusan information
     *
     * @OA\Get(
     *     path="/api/setup/st-kepengurusan",
     *     tags={"setup"},
     *     operationId="info",
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized"
     *     ),
     *     security={
     *         {"api_key": {"write:user", "read:user"}}
     *     },
     *   ),
     */

    public function getRefJenisKelamin()
    {

        $data = array(
            array('id' => 'L', 'nama' => 'Laki-laki'),
            array('id' => 'P', 'nama' => 'Perempuan'),
        );

        return response()->json($data);
    }
}
