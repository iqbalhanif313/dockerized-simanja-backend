<?php


namespace App\Http\Controllers\Setup;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use DB;

class DesaController extends Controller
{


    /**
     * Show Setup Desa information
     *
     * @OA\Get(
     *     path="/api/setup/desa",
     *     tags={"setup"},
     *     operationId="setup/desa",
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
        $query = "SELECT * FROM st_desa";
        $data = DB::select($query);
        return response()->json($data);
    }
}
