<?php


namespace App\Http\Controllers\Setup;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use DB;

class StatusJamaahController extends Controller
{


    /**
     * Show Setup StatusJamaah information
     *
     * @OA\Get(
     *     path="/api/setup/status-jamaah",
     *     tags={"setup"},
     *     operationId="setup/status-jamaah",
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
        $query = "SELECT * FROM st_status_jamaah";
        $data = DB::select($query);
        return response()->json($data);
    }

}
