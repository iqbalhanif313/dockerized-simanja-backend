<?php


namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Http\Request\Setup\BaseCreateSetupRequest;
use App\Http\Request\Setup\BaseUpdateSetupRequest;
use App\Services\Setup\JenisKegiatan\CreateJenisKegiatanService;
use App\Services\Setup\JenisKegiatan\DataJenisKegiatanService;
use App\Services\Setup\JenisKegiatan\DeleteJenisKegiatanService;
use App\Services\Setup\JenisKegiatan\UpdateJenisKegiatanService;

class JenisKegiatanController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Show Setup Jenis Kegiatan information
     *
     * @OA\Get(
     *     path="/api/setup/jenis-kegiatan",
     *     tags={"setup/jenis-kegiatan"},
     *     operationId="setup/jenis-kegiatan",
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
    public function index(DataJenisKegiatanService $service)
    {
        $result = $service->getAll();
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Show Detail Setup Jenis Kegiatan
     *
     * @OA\Get(
     *     path="/api/setup/jenis-kegiatan/{id}",
     *     tags={"setup/jenis-kegiatan"},
     *     operationId="setup/jenis-kegiatan/{id}",
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
    public function show(DataJenisKegiatanService $service, $id)
    {
        $result = $service->getByID($id);
        return $result->status ? $this->data($result->data)
        : $this->handleErrorRequest($result->message);
    }

    /**
     * Store Setup Desa
     *
     * @OA\Post(
     *     path="/api/setup/jenis-kegiatan",
     *     tags={"setup/jenis-kegiatan"},
     *     operationId="setup/jenis-kegiatan/store",
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
     *                  @OA\Property(property="id",
     *    					type="string",
     *    					example="SPR",
     *                  ),
     *                  @OA\Property(property="nama",
     *    					type="string",
     *    					example="Semampir",
     *                  ),
     *    			),
     *    		),
     *    	),
     *   ),
     */
    public function store(CreateJenisKegiatanService $service, BaseCreateSetupRequest $request){
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->handleErrorRequest($request->validator->messages()->first());
        }

        $data = $request->only(['id', 'nama']);
        $result = $service->create($data);

        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Update Setup Desa
     *
     * @OA\Put(
     *     path="/api/setup/jenis-kegiatan/{id}",
     *     tags={"setup/jenis-kegiatan"},
     *     operationId="setup/jenis-kegiatan/update",
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
     *                  @OA\Property(property="id",
     *    					type="string",
     *    					example="SPR",
     *                  ),
     *                  @OA\Property(property="nama",
     *    					type="string",
     *    					example="Semampir",
     *                  ),
     *    			),
     *    		),
     *    	),
     *   ),
     */
    public function update(UpdateJenisKegiatanService $service, BaseUpdateSetupRequest $request, $id){
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->handleErrorRequest($request->validator->messages()->first());
        }

        $data = $request->only(['id', 'nama']);
        $result = $service->update($data, $id);

        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Delete Setup Desa
     *
     * @OA\Delete(
     *     path="/api/setup/jenis-kegiatan/{id}",
     *     tags={"setup/jenis-kegiatan"},
     *     operationId="setup/jenis-kegiatan/{id}/delete",
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
    public function delete(DeleteJenisKegiatanService $service, $id){
        $result = $service->delete($id);
        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Show Ref Setup Jenis Kegiatan information
     *
     * @OA\Get(
     *     path="/api/ref/setup/jenis-kegiatan",
     *     tags={"references"},
     *     operationId="ref/setup/jenis-kegiatan",
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
    public function getRef(DataJenisKegiatanService $service)
    {
        $result = $service->getRef();
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }
}
