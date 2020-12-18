<?php


namespace App\Http\Controllers\Setup;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use DB;

class KategoriJamaahController extends Controller
{


    /**
     * Show Setup Jenis Kegiatan information
     *
     * @OA\Get(
     *     path="/api/setup/kategori-jamaah",
     *     tags={"setup"},
     *     operationId="setup/kategori-jamaah",
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
        $query = "SELECT * FROM st_kategori_jamaah";
        $data = DB::select($query);
        return response()->json($data);
    }
}
