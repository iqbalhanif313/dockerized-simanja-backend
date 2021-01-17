<?php


namespace App\Http\Controllers\Setup;

use App\Http\Request\CreateKelurahanRequest;
use App\Http\Request\UpdateKelurahanRequest;
use App\Http\Controllers\Controller;
use Exception;
use App\Services\Kelurahan\KelurahanService;

class KelurahanController extends Controller
{
    protected $kelurahanService;

    public function __construct(KelurahanService $kelurahanService)
    {
        $this->kelurahanService = $kelurahanService;
    }

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
        try{
            $data =  $this->kelurahanService->getAll();
            return $this->data($data);
        }catch (\Exception $e){
            return $this->handleErrorRequest($e->getMessage());
        }
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
    public function filter($st_kec_id)
    {
        $query = "SELECT * FROM st_kel WHERE st_kec_id ='$st_kec_id'";
        $data = DB::select($query);
        return response()->json($data);
    }
}
