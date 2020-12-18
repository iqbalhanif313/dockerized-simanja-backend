<?php


namespace App\Http\Controllers\Setup;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use DB;

class LevelController extends Controller
{


    /**
     * Show Setup Level information
     *
     * @OA\Get(
     *     path="/api/setup/level",
     *     tags={"setup"},
     *     operationId="setup/level",
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
        $query = "SELECT * FROM st_level";
        $data = DB::select($query);
        return response()->json($data);
    }

}
