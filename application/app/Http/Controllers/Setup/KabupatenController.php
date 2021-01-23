<?php


namespace App\Http\Controllers\Setup;

use App\Http\Request\CreateKabupatenRequest;
use App\Http\Request\UpdateKabupatenRequest;
use App\Http\Controllers\Controller;
use Exception;
use App\Services\Kabupaten\KabupatenService;

class KabupatenController extends Controller
{
    protected $kabupatenService;

    public function __construct(KabupatenService $kabupatenService)
    {
        $this->kabupatenService = $kabupatenService;
    }


    /**
     * Show Setup Kabupaten information
     *
     * @OA\Get(
     *     path="/api/setup/kabupaten",
     *     tags={"setup/kabupaten"},
     *     operationId="setup/kabupaten",
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
            $data =  $this->kabupatenService->getAll();
            return $this->data($data);
        }catch (\Exception $e){
            return $this->handleErrorRequest($e->getMessage());
        }
    }


    /**
     * Show Setup Kabupaten information
     *
     * @OA\Get(
     *     path="/api/setup/kabupaten/{st_provinsi_id}",
     *     tags={"setup/kabupaten"},
     *     operationId="setup/kabupaten/id",
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
    public function filter($st_provinsi_id)
    {
        // $query = "SELECT * FROM st_kab WHERE st_provinsi_id ='$st_provinsi_id'";
        // $data = DB::select($query);
        // return response()->json($data);

        try{
            $data =  $this->kabupatenService->getByFilter($st_provinsi_id);
            return $this->data($data);
        }catch (\Exception $e){
            return $this->handleErrorRequest($e->getMessage());
        }
    }
}
