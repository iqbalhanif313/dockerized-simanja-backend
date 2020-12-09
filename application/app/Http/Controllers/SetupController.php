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
     *     path="/api/showStDesa",
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

    public function showStDesa()
    {
        $stDesa = st_desa::all();

        return response()->json($stDesa);
    }

    /**
     * Show setup desa information
     *
     * @OA\Get(
     *     path="/api/showStKelompok",
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

    public function showStKelompok()
    {
        $stKelompok = st_kelompok::all();

        return response()->json($stKelompok);
    }

     /**
     * Show setup kepengurusan information
     *
     * @OA\Get(
     *     path="/api/showStKepengurusan",
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

    public function showStKepengurusan()
    {
        $stKepengurusan = st_kepengurusan::all();

        return response()->json($stKepengurusan);
    }



}
