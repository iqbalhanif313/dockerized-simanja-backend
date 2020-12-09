<?php


namespace App\Http\Controllers;

use App\Http\Request\CreateJamaahRequest;
use App\Http\Services\MdJamaah\JamaahService;
use App\Models\Jamaah;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\App;

class JamaahController extends Controller
{
    protected $jamaahService;

    public function __construct()
    {
        $this->jamaahService = new JamaahService();
    }

    /**
     * Create Jamaah information
     *
     * @OA\Post(
     *     path="/api/createJamaah",
     *     tags={"md_jamaah"},
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
     *    				 @OA\Property(property="Nama",
     *    					type="string",
     *    					example="",
     *    					description="Full name of jamaah"
     *    				),
     *    				 @OA\Property(property="Jenis Kelamin",
     *    					type="string",
     *    					example="",
     *    					description="write 'laki-laki' or 'perempuan'"
     *                  ),
     *                  @OA\Property(property="NIK",
     *    					type="bigInteger",
     *    					example="",
     *    					description="max length 16"
     *                  ),
     *                  @OA\Property(property="Tempat Lahir",
     *    					type="string",
     *    					example="",
     *    					description=""
     *                  ),
     *                  @OA\Property(property="Tanggal Lahir",
     *    					type="date",
     *    					example="",
     *    					description="YYYY-MM-DD"
     *                  ),
     *                  @OA\Property(property="HP",
     *    					type="string",
     *    					example="",
     *    					description="max:13"
     *                  ),
     *                  @OA\Property(property="Alamat",
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

    public function create(CreateJamaahRequest $request)
    {
        if (!$this->jamaahService->handleJamaahCreation($request)) {
            $this->handleBadRequest("Bad request at jamaah creation");
        }

        return $this->success("jamaah creation succeed");
    }

    /**
     * Show Jamaah information
     *
     * @OA\Get(
     *     path="/api/showJamaah",
     *     tags={"md_jamaah"},
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

    public function show()
    {
        $jamaah = Jamaah::all();

        return response()->json($jamaah);
    }
}
