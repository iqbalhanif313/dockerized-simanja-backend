<?php


namespace App\Http\Controllers\Master;

use App\Http\Request\Master\Kegiatan\CreateKegiatanRequest;
use App\Http\Request\Master\Kegiatan\UpdateKegiatanRequest;
use App\Http\Controllers\Controller;
use App\Services\Master\Kegiatan\CreateKegiatanService;
use App\Services\Master\Kegiatan\DataKegiatanService;
use App\Services\Master\Kegiatan\DeleteKegiatanService;
use App\Services\Master\Kegiatan\UpdateKegiatanService;

class KegiatanController extends Controller
{
    public function __construct()
    {

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
    public function index(DataKegiatanService $service)
    {
        $result = $service->getAll();
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
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
    public function show(DataKegiatanService $service, $id)
    {
        $result = $service->getByID($id);
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
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
    public function store(CreateKegiatanService $service, CreateKegiatanRequest $request)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->handleErrorRequest($request->validator->messages()->first());
        }

        $data = $request->only([
            'deskripsi',
            'st_level_id',
            'st_jenis_kegiatan_id',
            'st_kategori_jamaah_id',
            'st_desa_id',
            'md_kelompok_id'
        ]);

        $result = $service->create($data);

        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
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
    public function update(UpdateKegiatanService $service, UpdateKegiatanRequest $request, $id)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->handleErrorRequest($request->validator->messages()->first());
        }

        $data = $request->only([
            'deskripsi',
            'st_level_id',
            'st_jenis_kegiatan_id',
            'st_kategori_jamaah_id',
            'st_desa_id',
            'md_kelompok_id'
        ]);

        $result = $service->update($data, $id);

        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Delete Master Kegiatan
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
    public function delete(DeleteKegiatanService $service, $id) {
        $result = $service->delete($id);
        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Show Ref Master Kegiatan
     *
     * @OA\Get(
     *     path="/api/ref/master/kegiatan",
     *     tags={"references"},
     *     operationId="ref/master/kegiatan",
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
    public function getRef(DataKegiatanService $service)
    {
        $result = $service->getRef();
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }
}
