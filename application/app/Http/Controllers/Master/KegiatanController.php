<?php


namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use App\Services\Kegiatan\KegiatanService;

class KegiatanController extends Controller
{

    protected $kegiatanService;

    public function __construct(KegiatanService $kegiatanService)
    {
        $this->kegiatanService = $kegiatanService;
    }
    /**
     * Show List Master Kegiatan
     *
     * @OA\Get(
     *     path="/api/master/kegiatan",
     *     tags={"master/kegiatan"},
     *     operationId="master/kegiatan",
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
            $result['data'] = $this->kegiatanService->getAll();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    /**
     * Store Master Kegiatan
     *
     * @OA\Post(
     *     path="/api/master/kegiatan",
     *     tags={"master/kegiatan"},
     *     operationId="storekegiatan",
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
     *    			mediaType="multipart/form-data",
     *    			@OA\Schema(
     *                  @OA\Property(property="id",
     *    					type="string",
     *    					example="P-R-DRH",
     *    					description="max length 25"
     *                  ),
     *                  @OA\Property(property="deskripsi",
     *    					type="string",
     *    					example="Pengajian Muda-Mudi Daerah",
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
            'deskripsi',
            'st_level_id',
            'st_jenis_kegiatan_id',
            'st_kategori_jamaah_id',
            'st_desa_id',
            'md_kelompok_id'
        ]);

        $result = ['status' => 200];

        try {
            $result['message'] = "ok";
            $result['data'] = $this->kegiatanService->saveData($data);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    /**
     * Show Detail Master Kegiatan
     *
     * @OA\Get(
     *     path="/api/master/kegiatan/{id}",
     *     tags={"master/kegiatan"},
     *     operationId="master/kegiatan/{id}",
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
            $result['data'] = $this->kegiatanService->getById($id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }

    /**
     * Update Master Kegiatan
     *
     * @OA\Put(
     *     path="/api/master/kegiatan/{id}",
     *     tags={"master/kegiatan"},
     *     operationId="updatekegiatan",
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
     *    			mediaType="application/x-www-form-urlencoded",
     *    			@OA\Schema(
     *                  @OA\Property(property="id",
     *    					type="string",
     *    					example="P-R-DRH",
     *    					description="max length 25"
     *                  ),
     *                  @OA\Property(property="deskripsi",
     *    					type="string",
     *    					example="Pengajian Muda-Mudi Daerah",
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
    public function update(Request $request, $id)
    {
        $data = $request->only([
            'id',
            'deskripsi',
            'st_level_id',
            'st_jenis_kegiatan_id',
            'st_kategori_jamaah_id',
            'st_desa_id',
            'md_kelompok_id'
        ]);

        $result = ['status' => 200];

        try {
            $result['data'] = $this->kegiatanService->updateData($data, $id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }
}
