<?php


namespace App\Http\Controllers\Master;

use App\Http\Request\CreateJamaahRequest;
use App\Services\MdJamaah\JamaahService;
use App\Http\Controllers\Controller;
use Exception;

class JamaahController extends Controller
{
    protected $jamaahService;

    public function __construct(JamaahService $jamaahService)
    {
        $this->jamaahService = $jamaahService;
    }

    /**
     * Show Jamaah information
     *
     * @OA\Get(
     *     path="/api/master/jamaah",
     *     tags={"master/jamaah"},
     *     operationId="info",
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
            $result['data'] = $this->jamaahService->getAll();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    public function show($id)
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->jamaahService->getById($id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }

    /**
     * Create Jamaah information
     *
     * @OA\Post(
     *     path="/api/master/jamaah/store",
     *     tags={"master/jamaah"},
     *     operationId="register",
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
     *                  @OA\Property(property="nik",
     *    					type="bigInteger",
     *    					example="",
     *    					description="max length 16"
     *                  ),
     *    				 @OA\Property(property="nama",
     *    					type="string",
     *    					example="Slamet Sampurno",
     *    					description="Full name of jamaah"
     *    				),
     *    				 @OA\Property(property="jenis_kelamin",
     *    					type="string",
     *    					example="L",
     *    					description="Tulis 'L' or 'P'"
     *                  ),
     *                  
     *                  @OA\Property(property="tempat_lahir",
     *    					type="string",
     *    					example="",
     *    					description=""
     *                  ),
     *                  @OA\Property(property="tanggal_lahir",
     *    					type="date",
     *    					example="",
     *    					description="YYYY-MM-DD"
     *                  ),
     *                  @OA\Property(property="hp",
     *    					type="string",
     *    					example="",
     *    					description="max:13"
     *                  ),
     *                  @OA\Property(property="alamat",
     *    					type="string",
     *    					example="",
     *    					description=""
     *                  ),
     *                  @OA\Property(property="users_id",
     *    					type="unsignedBigInteger",
     *    					example="",
     *    					description="available id: 1"
     *                  ),
     *                  @OA\Property(property="st_kelompok_id",
     *    					type="unsignedBigInteger",
     *    					example="",
     *    					description="available id: 1 and 2"
     *                  ),
     *                  @OA\Property(property="st_kategori_jamaah_id",
     *    					type="unsignedBigInteger",
     *    					example="",
     *    					description="available id: 1 and 2"
     *                  ),
     *                  @OA\Property(property="st_status_jamaah_id",
     *    					type="unsignedBigInteger",
     *    					example="",
     *    					description="available id: 1 and 2"
     *                  ),
     *                  @OA\Property(property="provinsi_id",
     *    					type="unsignedBigInteger",
     *    					example="",
     *    					description="available id: 1 and 2"
     *                  ),
     *                  @OA\Property(property="kab_id",
     *    					type="unsignedBigInteger",
     *    					example="",
     *    					description="available id: 1"
     *                  ),
     *                  @OA\Property(property="kec_id",
     *    					type="unsignedBigInteger",
     *    					example="",
     *    					description="available id: 1"
     *                  ),
     *                  @OA\Property(property="kel_id",
     *    					type="unsignedBigInteger",
     *    					example="",
     *    					description="available id: 1"
     *                  ),
     *    			),
     *    		),
     *    	),
     *   ),
     */

    public function store(CreateJamaahRequest $request)
    {
        if (!$this->jamaahService->handleJamaahCreation($request)) {
            $this->handleBadRequest("Bad request at jamaah creation");
        }

        return $this->success("jamaah creation succeed");
    }
}
