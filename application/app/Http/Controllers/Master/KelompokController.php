<?php


namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use DB;
use Exception;
use App\Services\Kelompok\KelompokService;

class KelompokController extends Controller
{

    protected $kelompokService;

    public function __construct(KelompokService $kelompokService)
    {
        $this->kelompokService = $kelompokService;
    }
    /**
     * Show List Kelompok
     *
     * @OA\Get(
     *     path="/api/master/kelompok",
     *     tags={"master/kelompok"},
     *     operationId="master/kelompok",
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
            $result['message'] = "ok";
            $result['data'] = $this->kelompokService->getAll();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    /**
     * Store Master Kelompok
     *
     * @OA\Post(
     *     path="/api/master/kelompok",
     *     tags={"master/kelompok"},
     *     operationId="master/kelompok/store",
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
     *    	@OA\RequestBody(
     *    		@OA\MediaType(
     *    			mediaType="application/json",
     *    			@OA\Schema(
     *                  @OA\Property(property="id",
     *    					type="string",
     *    					example="P-R-DRH",
     *    					description="max length 25"
     *                  ),
     *                  @OA\Property(property="deskripsi",
     *    					type="string",
     *    					example="Pengajian Muda-Mudi Daerah",
     *    					description="max length 16"
     *                  ),
     *    				 @OA\Property(property="st_level_id",
     *    					type="string",
     *    					example="DRH",
     *    					description="Lihat Tabel st_level"
     *    				),
     *    				 @OA\Property(property="st_jenis_kegiatan_id",
     *    					type="string",
     *    					example="P",
     *    					description=""
     *                  ),
     *                  
     *                  @OA\Property(property="st_kategori_jamaah_id",
     *    					type="string",
     *    					example="R",
     *    					description=""
     *                  ),
     *                  @OA\Property(property="st_desa_id",
     *    					type="string",
     *    					example="",
     *    					description="optional"
     *                  ),
     *                  @OA\Property(property="md_kelompok_id",
     *    					type="string",
     *    					example="",
     *    					description="optional"
     *                  ),
     *    			),
     *    		),
     *    	),
     *   ),
     */

    public function store(Request $request)
    {
        $data = $request->only([
            'id',
            'st_desa_id',
            'nama',
            'alamat'
        ]);

        $result = ['status' => 200];

        try {
            $result['message'] = "ok";
            $result['data'] = $this->kelompokService->saveData($data);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    /**
     * Show Detail Kelompok
     *
     * @OA\Get(
     *     path="/api/master/kelompok/id",
     *     tags={"master/kelompok"},
     *     operationId="master/kelompok/id",
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

    public function show($id)
    {
        $result = ['status' => 200];

        try {
            $result['message'] = "ok";
            $result['data'] = $this->kelompokService->getById($id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only([
            'id',
            'st_desa_id',
            'nama',
            'alamat'
        ]);

        $result = ['status' => 200];

        try {
            $result['data'] = $this->kelompokService->updateData($data, $id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }
}
