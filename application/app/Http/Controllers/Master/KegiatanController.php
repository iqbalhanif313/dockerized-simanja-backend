<?php


namespace App\Http\Controllers\Master;

use App\Helpers\MsgHelper;
use App\Http\Request\Master\Kegiatan\CreateKegiatanRequest;
use App\Http\Request\Master\Kegiatan\UpdateKegiatanRequest;
use App\Http\Controllers\Controller;
use Exception;
use App\Services\Kegiatan\KegiatanService;

class KegiatanController extends Controller
{
    protected $service;

    public function __construct(KegiatanService $service)
    {
        $this->service = $service;
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
        try {
            $result = $this->service->getAll();
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }

        return $this->data($result);
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
    public function store(CreateKegiatanRequest $request)
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

        try {
            $this->service->create($data);
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }

        return $this->success(MsgHelper::CREATE_SUCCESS);
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
    public function update(UpdateKegiatanRequest $request, $id)
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

        try {
            $this->service->update($data, $id);
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }

        return $this->success(MsgHelper::UPDATE_SUCCESS);
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
    public function delete($nik) {
        $result = $this->service->delete($nik);
        return $result ? $this->success(MsgHelper::DELETE_SUCCESS) : $this->handleErrorRequest(MsgHelper::DELETE_FAIL);
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
    public function getRef()
    {
        try {
            $result = $this->service->getRef();
        } catch (Exception $exception) {
            return $this->handleErrorRequest($exception->getMessage());
        }
        return $this->data($result);
    }
}
