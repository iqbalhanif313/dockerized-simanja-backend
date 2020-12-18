<?php


namespace App\Http\Controllers\Setup;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use DB;

class ProvinsiController extends Controller
{


    /**
     * Show Setup Provinsi information
     *
     * @OA\Get(
     *     path="/api/setup/provinsi",
     *     tags={"setup"},
     *     operationId="provinsi",
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
        $query = "SELECT * FROM st_provinsi";
        $data = DB::select($query);
        return response()->json($data);
    }

}
