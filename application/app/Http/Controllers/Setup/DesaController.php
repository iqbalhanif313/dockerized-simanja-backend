<?php


namespace App\Http\Controllers\Setup;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use DB;
use Exception;
use App\Services\DesaService;

class DesaController extends Controller
{

    protected $desaService;

    public function __construct(DesaService $desaService)
    {
        $this->desaService = $desaService;
    }
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
        $result = ['status' => 200];

        try {
            $result['data'] = $this->desaService->getAll();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);

        // $query = "SELECT * FROM st_desa";
        // $data = DB::select($query);
        // return response()->json($data);
    }
}
