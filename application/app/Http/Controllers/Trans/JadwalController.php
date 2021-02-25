<?php


namespace App\Http\Controllers\Trans;

use App\Http\Request\Trans\Jadwal\CreateJadwalRequest;
use App\Http\Request\Trans\Jadwal\UpdateJadwalRequest;
use App\Services\Trans\Jadwal\CreateJadwalService;
use App\Services\Trans\Jadwal\DataJadwalService;
use App\Http\Controllers\Controller;
use App\Services\Trans\Jadwal\DeleteJadwalService;
use App\Services\Trans\Jadwal\UpdateJadwalService;

class JadwalController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Show List Trans Jadwal
     *
     * @OA\Get(
     *     path="/api/trans/jadwal",
     *     tags={"trans/jadwal"},
     *     operationId="trans/jadwal",
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
    public function index(DataJadwalService $service)
    {
        $result = $service->getAll();
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Show Detail Trans Jadwal
     *
     * @OA\Get(
     *     path="/api/trans/jadwal/{id}",
     *     tags={"trans/jadwal"},
     *     operationId="trans/jadwal/id",
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
    public function show(DataJadwalService $service, $id)
    {
        $result = $service->getByID($id);
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Store Trans Jadwal
     *
     * @OA\Post(
     *     path="/api/trans/jadwal",
     *     tags={"trans/jadwal"},
     *     operationId="trans/jadwal/store",
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
    public function store(CreateJadwalService $service, CreateJadwalRequest $request)
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
     * Update Trans Jadwal
     *
     * @OA\Put(
     *     path="/api/trans/jadwal/{id}",
     *     tags={"trans/jadwal"},
     *     operationId="trans/jadwal/update",
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
    public function update(UpdateJadwalService $service, UpdateJadwalRequest $request, $id)
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
     * Delete Trans Jadwal
     *
     * @OA\Delete(
     *     path="/api/trans/jadwal/{id}",
     *     tags={"trans/jadwal"},
     *     operationId="trans/jadwal/{id}/delete",
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
    public function delete(DeleteJadwalService $service, $id) {
        $result = $service->delete($id);
        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
    }
}
