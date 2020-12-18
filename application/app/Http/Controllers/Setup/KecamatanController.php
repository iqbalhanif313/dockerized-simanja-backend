<?php


namespace App\Http\Controllers\Setup;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use DB;

class KecamatanController extends Controller
{


    /**
     * Show Setup Kecamatan information
     *
     * @OA\Get(
     *     path="/api/setup/kecamatan",
     *     tags={"setup"},
     *     operationId="setup/kecamatan",
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

    public function index()
    {
        $query = "SELECT * FROM st_kec";
        $data = DB::select($query);
        return response()->json($data);
    }


    /**
     * Show Setup Kecamatan information
     *
     * @OA\Get(
     *     path="/api/setup/kecamatan/{st_kab_id}",
     *     tags={"setup"},
     *     operationId="setup/kecamatan/id",
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
    public function getById($st_kab_id)
    {
        $query = "SELECT * FROM st_kec WHERE st_kab_id ='$st_kab_id'";
        $data = DB::select($query);
        return response()->json($data);
    }
}
