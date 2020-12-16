<?php
namespace App\Http\Controllers;

use App\Models\st_desa;
use App\Models\st_kelompok;
use App\Models\st_kepengurusan;

class SetupController extends Controller
{
    /**
     * Show setup desa information
     *
     * @OA\Get(
     *     path="/api/setup/st-desa",
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

    public function getStDesa()
    {
        $stDesa = st_desa::all();

        return response()->json($stDesa);
    }

    /**
     * Show setup desa information
     *
     * @OA\Get(
     *     path="/api/setup/st-kelompok",
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

    public function getStKelompok()
    {
        $stKelompok = st_kelompok::all();

        return response()->json($stKelompok);
    }

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

    public function getStKepengurusan()
    {
        $stKepengurusan = st_kepengurusan::all();

        return response()->json($stKepengurusan);
    }



}
