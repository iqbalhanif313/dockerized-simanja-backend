<?php


namespace App\Http\Controllers\Master;

use App\Http\Request\CreateJamaahRequest;
use App\Http\Services\MdJamaah\JamaahService;
use App\Models\Jamaah;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use DB;

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

    public function store(CreateJamaahRequest $request)
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
        $query =
            "SELECT md_jamaah.*,u.*,sk.nama as kecamatan, s.nama as kelurahan,k.nama as kabupaten,sp.nama as provinsi,ssj.nama as status,skj.nama as kategori,mk.nama as kelompok from md_jamaah
                LEFT JOIN st_kec sk on md_jamaah.st_kec_id = sk.id
                LEFT JOIN st_kel s on md_jamaah.st_kel_id = s.id
                LEFT JOIN st_kab k on md_jamaah.st_kab_id = k.id
                LEFT JOIN st_provinsi sp on k.st_provinsi_id = sp.id
                LEFT JOIN st_status_jamaah ssj on md_jamaah.st_status_jamaah_id = ssj.id
                LEFT JOIN st_kategori_jamaah skj on md_jamaah.st_kategori_jamaah_id = skj.id
                LEFT JOIN md_kelompok mk on md_jamaah.md_kelompok_id = mk.id
                LEFT JOIN users u on md_jamaah.users_id = u.id
                WHERE md_jamaah.deleted_at IS NULL";
        $data = DB::select($query);
        return response()->json($data);
    }
}
