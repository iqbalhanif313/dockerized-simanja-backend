<?php


namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Http\Request\Setup\BaseCreateSetupRequest;
use App\Http\Request\Setup\BaseUpdateSetupRequest;
use App\Services\Setup\KategoriJamaah\CreateKategoriJamaahService;
use App\Services\Setup\KategoriJamaah\DataKategoriJamaahService;
use App\Services\Setup\KategoriJamaah\DeleteKategoriJamaahService;
use App\Services\Setup\KategoriJamaah\UpdateKategoriJamaahService;

class KategoriJamaahController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Show Setup Jenis Kegiatan information
     *
     * @OA\Get(
     *     path="/api/setup/kategori-jamaah",
     *     tags={"setup/kategori-jamaah"},
     *     operationId="setup/kategori-jamaah",
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
    public function index(DataKategoriJamaahService $service)
    {
        $result = $service->getAll();
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Show Detail Setup KategoriJamaah
     *
     * @OA\Get(
     *     path="/api/setup/kategori-jamaah/{id}",
     *     tags={"setup/kategori-jamaah"},
     *     operationId="setup/kategori-jamaah/{id}",
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
    public function show(DataKategoriJamaahService $service, $id)
    {
        $result = $service->getByID($id);
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Store Setup KategoriJamaah
     *
     * @OA\Post(
     *     path="/api/setup/kategori-jamaah",
     *     tags={"setup/kategori-jamaah"},
     *     operationId="setup/kategori-jamaah/store",
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
     *    					example="DRH",
     *                  ),
     *                  @OA\Property(property="nama",
     *    					type="string",
     *    					example="Daerah",
     *                  ),
     *    			),
     *    		),
     *    	),
     *   ),
     */
    public function store(CreateKategoriJamaahService $service, BaseCreateSetupRequest $request)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->handleErrorRequest($request->validator->messages()->first());
        }

        $data = $request->only(['id', 'nama']);
        $result = $service->create($data);

        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Update Setup KategoriJamaah
     *
     * @OA\Put(
     *     path="/api/setup/kategori-jamaah/{id}",
     *     tags={"setup/kategori-jamaah"},
     *     operationId="setup/kategori-jamaah/update",
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
     *    					example="DRH",
     *                  ),
     *                  @OA\Property(property="nama",
     *    					type="string",
     *    					example="Daerah",
     *                  ),
     *    			),
     *    		),
     *    	),
     *   ),
     */
    public function update(UpdateKategoriJamaahService $service, BaseUpdateSetupRequest $request, $id)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->handleErrorRequest($request->validator->messages()->first());
        }

        $data = $request->only(['id', 'nama']);
        $result = $service->update($data, $id);

        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Delete Setup KategoriJamaah
     *
     * @OA\Delete(
     *     path="/api/setup/kategori-jamaah/{id}",
     *     tags={"setup/kategori-jamaah"},
     *     operationId="setup/kategori-jamaah/{id}/delete",
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
    public function delete(DeleteKategoriJamaahService $service, $id)
    {
        $result = $service->delete($id);
        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Show Ref Setup Kategori Jamaah information
     *
     * @OA\Get(
     *     path="/api/ref/setup/kategori-jamaah",
     *     tags={"references"},
     *     operationId="ref/setup/kategori-jamaah",
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
    public function getRef(DataKategoriJamaahService $service)
    {
        $result = $service->getRef();
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }
}
