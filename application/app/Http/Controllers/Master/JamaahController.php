<?php


namespace App\Http\Controllers\Master;

use App\Http\Request\Master\Jamaah\CreateJamaahRequest;
use App\Http\Request\Master\Jamaah\UpdateJamaahRequest;
use App\Services\MdJamaah\JamaahService;
use App\Http\Controllers\Controller;
use Exception;

class JamaahController extends Controller
{
    protected $service;

    public function __construct(JamaahService $service)
    {
        $this->service = $service;
    }

    /**
     * Show List Jamaah
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
        try {
            $result = $this->service->getAll();
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }
        return $this->data($result);
    }

    /**
     * Show Detail Jamaah
     *
     * @OA\Get(
     *     path="/api/master/jamaah/{id}",
     *     tags={"master/jamaah"},
     *     operationId="master/jamaah/{id}",
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
            $result['data'] = $this->service->getById($id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }

    /**
     * Create Jamaah information
     *
     * @OA\Post(
     *     path="/api/master/jamaah",
     *     tags={"master/jamaah"},
     *     operationId="store",
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
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->handleErrorRequest($request->validator->messages()->first());
        }

        $data = $request->only([
            'nik',
            'nama',
            'jenis_kelamin',
            'tempat_lahir',
            'tanggal_lahir',
            'hp',
            'alamat',
            'users_id',
            'st_provinsi_id',
            'st_kab_id',
            'st_kec_id',
            'st_kel_id',
            'md_kelompok_id',
            'st_kategori_jamaah_id',
            'st_status_jamaah_id'
        ]);

        try {
            $this->service->create($data);
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }

        return $this->success('Data berhasil disimpan!');
    }

    /**
     * Update Jamaah
     *
     * @OA\Put(
     *     path="/api/master/jamaah/{nik}",
     *     tags={"master/jamaah"},
     *     operationId="master/jamaah/update",
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
     *                  @OA\Property(property="tanggal",
     *    					type="date",
     *    					example="2020-12-22",
     *                  ),
     *                  @OA\Property(property="jam_mulai",
     *    					type="time",
     *    					example="19:30:00",
     *                  ),
     *    				 @OA\Property(property="jam_selesai",
     *    					type="time",
     *    					example="21:30:00",
     *    					description=""
     *    				),
     *    				 @OA\Property(property="md_kegiatan_id",
     *    					type="string",
     *    					example="P-U-DRH",
     *    					description=""
     *                  ),
     *    			),
     *    		),
     *    	),
     *   ),
     */
    public function update(UpdateJamaahRequest $request, $nik)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->handleErrorRequest($request->validator->messages()->first());
        }

        $data = $request->only([
            'nik',
            'nama',
            'jenis_kelamin',
            'tempat_lahir',
            'tanggal_lahir',
            'hp',
            'alamat',
            'users_id',
            'st_provinsi_id',
            'st_kab_id',
            'st_kec_id',
            'st_kel_id',
            'md_kelompok_id',
            'st_kategori_jamaah_id',
            'st_status_jamaah_id'
        ]);

        try {
            $this->service->update($data, $nik);
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }

        return $this->success('Data berhasil diupdate!');
    }

    /**
     * Show Ref Master Jamaah
     *
     * @OA\Get(
     *     path="/api/ref/master/jamaah",
     *     tags={"references"},
     *     operationId="ref/master/jamaah",
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
    public function getRef()
    {
        try {
            $result = $this->service->getRef();
        } catch (Exception $exception) {
            return $this->handleErrorRequest($exception->getMessage());
        }
        return $this->data($result);
    }

    /**
     * Delete Master Jamaah
     *
     * @OA\Delete(
     *     path="/api/master/jamaah/{nik}",
     *     tags={"master/jamaah"},
     *     operationId="master/jamaah/{nik}/delete",
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
    public function delete($nik) {
        $result = $this->service->delete($nik);
        return $result ? $this->success('data berhasil dihapus') : $this->handleErrorRequest('data gagal dihapus');
    }
}
