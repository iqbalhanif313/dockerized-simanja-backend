<?php


namespace App\Http\Controllers\Master;

use App\Http\Request\Master\Jamaah\CreateJamaahRequest;
use App\Http\Request\Master\Jamaah\UpdateJamaahRequest;
use App\Http\Controllers\Controller;
use App\Services\Master\Jamaah\CreateJamaahService;
use App\Services\Master\Jamaah\DataJamaahService;
use App\Services\Master\Jamaah\DeleteJamaahService;
use App\Services\Master\Jamaah\UpdateJamaahService;

class JamaahController extends Controller
{
    public function __construct()
    {

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
    public function index(DataJamaahService $service)
    {
        $result = $service->getAll();
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
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
    public function show(DataJamaahService $service, $id)
    {
        $result = $service->getByID($id);
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
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
    public function store(CreateJamaahService $service, CreateJamaahRequest $request)
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

        $result = $service->create($data);

        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
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
    public function update(UpdateJamaahService $service, UpdateJamaahRequest $request, $nik)
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

        $result = $service->update($data, $nik);

        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
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
    public function delete(DeleteJamaahService $service, $nik) {
        $result = $service->delete($nik);
        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
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
    public function getRef(DataJamaahService $service)
    {
        $result = $service->getRef();
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }
}
