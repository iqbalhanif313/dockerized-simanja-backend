<?php


namespace App\Http\Controllers\Setup;

use App\Http\Request\CreateKecamatanRequest;
use App\Http\Request\UpdateKecamatanRequest;
use App\Http\Controllers\Controller;
use Exception;
use App\Services\Kecamatan\KecamatanService;

class KecamatanController extends Controller
{
    protected $kecamatanService;

    public function __construct(KecamatanService $kecamatanService)
    {
        $this->kecamatanService = $kecamatanService;
    }

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
        try{
            $data =  $this->kecamatanService->getAll();
            return $this->data($data);
        }catch (\Exception $e){
            return $this->handleErrorRequest($e->getMessage());
        }
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
    public function filter($st_kab_id)
    {
        $query = "SELECT * FROM st_kec WHERE st_kab_id ='$st_kab_id'";
        $data = DB::select($query);
        return response()->json($data);
    }
}
