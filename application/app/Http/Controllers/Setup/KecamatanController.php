<?php


namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Http\Request\Setup\Kecamatan\CreateKecamatanRequest;
use App\Http\Request\Setup\Kecamatan\UpdateKecamatanRequest;
use App\Services\Setup\Kecamatan\CreateKecamatanService;
use App\Services\Setup\Kecamatan\DataKecamatanService;
use App\Services\Setup\Kecamatan\DeleteKecamatanService;
use App\Services\Setup\Kecamatan\UpdateKecamatanService;

class KecamatanController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Show Setup Kecamatan information
     *
     * @OA\Get(
     *     path="/api/setup/kecamatan",
     *     tags={"setup/kecamatan"},
     *     operationId="setup/kecamatan",
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

    public function index(DataKecamatanService $service)
    {
        $result = $service->getAll();
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Show Detail Setup Kecamatan
     *
     * @OA\Get(
     *     path="/api/setup/kecamatan/{id}",
     *     tags={"setup/kecamatan"},
     *     operationId="setup/kecamatan/{id}",
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
    public function show(DataKecamatanService $service, $id)
    {
        $result = $service->getByID($id);
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Store Setup Kecamatan
     *
     * @OA\Post(
     *     path="/api/setup/kecamatan",
     *     tags={"setup/kecamatan"},
     *     operationId="setup/kecamatan/store",
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
    public function store(CreateKecamatanService $service, CreateKecamatanRequest $request)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->handleErrorRequest($request->validator->messages()->first());
        }

        $data = $request->only(['id', 'nama', 'st_kab_id']);
        $result = $service->create($data);

        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Update Setup Kecamatan
     *
     * @OA\Put(
     *     path="/api/setup/kecamatan/{id}",
     *     tags={"setup/kecamatan"},
     *     operationId="setup/kecamatan/update",
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
     *    					example="",
     *                  ),
     *                  @OA\Property(property="nama",
     *    					type="string",
     *    					example="",
     *                  ),
     *    			),
     *    		),
     *    	),
     *   ),
     */
    public function update(UpdateKecamatanService $service, UpdateKecamatanRequest $request, $id)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->handleErrorRequest($request->validator->messages()->first());
        }

        $data = $request->only(['id', 'nama', 'st_kab_id']);
        $result = $service->update($data, $id);

        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Delete Setup Kecamatan
     *
     * @OA\Delete(
     *     path="/api/setup/kecamatan/{id}",
     *     tags={"setup/kecamatan"},
     *     operationId="setup/kecamatan/{id}/delete",
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
    public function delete(DeleteKecamatanService $service, $id)
    {
        $result = $service->delete($id);
        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Show Ref Setup Kecamatan information
     *
     * @OA\Get(
     *     path="/api/ref/setup/kecamatan",
     *     tags={"references"},
     *     operationId="ref/setup/kecamatan",
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
    public function getRef(DataKecamatanService $service)
    {
        $result = $service->getRef();
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Show Ref Setup Kecamatan by Provinsi information
     *
     * @OA\Get(
     *     path="/api/ref/setup/kecamatan/{kab}",
     *     tags={"references"},
     *     operationId="ref/setup/kecamatan/{kab}",
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
    public function getFRef(DataKecamatanService $service, $kab)
    {
        $result = $service->getFRef($kab);
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }
}
