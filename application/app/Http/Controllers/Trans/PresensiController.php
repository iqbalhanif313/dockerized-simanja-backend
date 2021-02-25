<?php


namespace App\Http\Controllers\Trans;

use App\Http\Controllers\Controller;
use App\Http\Request\Trans\Presensi\CreatePresensiRequest;
use App\Http\Request\Trans\Presensi\UpdatePresensiRequest;
use App\Services\Trans\Presensi\CreatePresensiService;
use App\Services\Trans\Presensi\DataPresensiService;
use App\Services\Trans\Presensi\DeletePresensiService;
use App\Services\Trans\Presensi\UpdatePresensiService;

class PresensiController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Show List Presensi
     *
     * @OA\Get(
     *     path="/api/trans/presensi",
     *     tags={"trans/presensi"},
     *     operationId="trans/presensi",
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
    public function index(DataPresensiService $service)
    {
        $result = $service->getAll();
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Show Detail Presensi By ID
     *
     * @OA\Get(
     *     path="/api/trans/presensi/{id}",
     *     tags={"trans/presensi"},
     *     operationId="trans/presensi/byId",
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
    public function show(DataPresensiService $service, $id)
    {
        $result = $service->getByID($id);
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Show List Presensi By Trans Jadwal Id
     *
     * @OA\Get(
     *     path="/api/trans/presensi/{trans_jadwal_id}",
     *     tags={"trans/presensi"},
     *     operationId="trans/presensi/{trans_jadwal_id}",
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
    public function showByJadwal(DataPresensiService $service, $trans_jadwal_id)
    {
        $result = $service->getByJadwal($trans_jadwal_id);
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Store Trans Presensi
     *
     * @OA\Post(
     *     path="/api/trans/presensi",
     *     tags={"trans/presensi"},
     *     operationId="trans/presensi/store",
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
     *                  @OA\Property(property="tanggal",
     *    					type="date",
     *    					example="2020-02-02",
     *                  ),
     *                  @OA\Property(property="jam_mulai",
     *    					type="time",
     *    					example="20:20",
     *                  ),
     *                  @OA\Property(property="jam_selesai",
     *    					type="time",
     *    					example="21:21",
     *                  ),
     *                  @OA\Property(property="md_kegiatan_id",
     *    					type="string",
     *    					example="0d85a5a1-b969-4d0a-978a-cb000ae9a438",
     *                  ),
     *    			),
     *    		),
     *    	),
     *   ),
     */
    public function store(CreatePresensiService $service, CreatePresensiRequest $request)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->handleErrorRequest($request->validator->messages()->first());
        }

        $data = $request->only([
            'tanggal',
            'jam_mulai',
            'jam_selesai',
            'md_kegiatan_id'
        ]);

        $result = $service->create($data);

        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Update Trans Presensi
     *
     * @OA\Put(
     *     path="/api/trans/presensi/{id}",
     *     tags={"trans/presensi"},
     *     operationId="trans/presensi/update",
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
     *                  @OA\Property(property="tanggal",
     *    					type="date",
     *    					example="2020-02-02",
     *                  ),
     *                  @OA\Property(property="jam_mulai",
     *    					type="time",
     *    					example="20:20",
     *                  ),
     *                  @OA\Property(property="jam_selesai",
     *    					type="time",
     *    					example="21:21",
     *                  ),
     *                  @OA\Property(property="md_kegiatan_id",
     *    					type="string",
     *    					example="0d85a5a1-b969-4d0a-978a-cb000ae9a438",
     *                  ),
     *    			),
     *    		),
     *    	),
     *   ),
     */
    public function update(UpdatePresensiService $service, UpdatePresensiRequest $request, $id)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->handleErrorRequest($request->validator->messages()->first());
        }

        $data = $request->only([
            'tanggal',
            'jam_mulai',
            'jam_selesai',
            'md_kegiatan_id'
        ]);

        $result = $service->update($data, $id);

        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Delete Trans Presensi
     *
     * @OA\Delete(
     *     path="/api/trans/presensi/{id}",
     *     tags={"trans/presensi"},
     *     operationId="trans/presensi/{id}/delete",
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
    public function delete(DeletePresensiService $service, $id)
    {
        $result = $service->delete($id);
        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
    }
}
