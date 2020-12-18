<?php


namespace App\Http\Controllers\Setup;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use DB;

class KelurahanController extends Controller
{


    /**
     * Show Setup Kelurahan information
     *
     * @OA\Get(
     *     path="/api/setup/kelurahan",
     *     tags={"setup"},
     *     operationId="setup/kelurahan",
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
        $query = "SELECT * FROM st_kel";
        $data = DB::select($query);
        return response()->json($data);
    }


    /**
     * Show Setup Kelurahan information
     *
     * @OA\Get(
     *     path="/api/setup/kelurahan/{st_kab_id}",
     *     tags={"setup"},
     *     operationId="setup/kelurahan/id",
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
    public function getById($st_kec_id)
    {
        $query = "SELECT * FROM st_kel WHERE st_kec_id ='$st_kec_id'";
        $data = DB::select($query);
        return response()->json($data);
    }
}
