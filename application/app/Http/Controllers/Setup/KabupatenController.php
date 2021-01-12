<?php


namespace App\Http\Controllers\Setup;

use App\Services\Kabupaten\KabupatenService;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use DB;

class KabupatenController extends Controller
{
    private $kabupatenService;
    public function __construct()
    {
        $this->kabupatenService = new KabupatenService();
    }


    /**
     * Show Setup Kabupaten information
     *
     * @OA\Get(
     *     path="/api/setup/kabupaten",
     *     tags={"setup"},
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
     *     tags={"setup"},
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
    public function getById($st_provinsi_id)
    {
        $query = "SELECT * FROM st_kab WHERE st_provinsi_id ='$st_provinsi_id'";
        $data = DB::select($query);
        return response()->json($data);
    }
}
