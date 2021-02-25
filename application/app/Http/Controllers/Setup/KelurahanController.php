<?php


namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Http\Request\Setup\Kelurahan\CreateKelurahanRequest;
use App\Http\Request\Setup\Kelurahan\UpdateKelurahanRequest;
use App\Services\Setup\Kelurahan\CreateKelurahanService;
use App\Services\Setup\Kelurahan\DataKelurahanService;
use App\Services\Setup\Kelurahan\DeleteKelurahanService;
use App\Services\Setup\Kelurahan\UpdateKelurahanService;

class KelurahanController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Show Setup Kelurahan information
     *
     * @OA\Get(
     *     path="/api/setup/kelurahan",
     *     tags={"setup/kelurahan"},
     *     operationId="setup/kelurahan",
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
    public function index(DataKelurahanService $service)
    {
        $result = $service->getAll();
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Show Detail Setup Kelurahan
     *
     * @OA\Get(
     *     path="/api/setup/kelurahan/{id}",
     *     tags={"setup/kelurahan"},
     *     operationId="setup/kelurahan/{id}",
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
    public function show(DataKelurahanService $service, $id)
    {
        $result = $service->getByID($id);
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Store Setup Kelurahan
     *
     * @OA\Post(
     *     path="/api/setup/kelurahan",
     *     tags={"setup/kelurahan"},
     *     operationId="setup/kelurahan/store",
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
    public function store(CreateKelurahanService $service, CreateKelurahanRequest $request)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->handleErrorRequest($request->validator->messages()->first());
        }

        $data = $request->only(['id', 'nama', 'st_kec_id']);
        $result = $service->create($data);

        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Update Setup Kelurahan
     *
     * @OA\Put(
     *     path="/api/setup/kelurahan/{id}",
     *     tags={"setup/kelurahan"},
     *     operationId="setup/kelurahan/update",
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
    public function update(UpdateKelurahanService $service, UpdateKelurahanRequest $request, $id)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->handleErrorRequest($request->validator->messages()->first());
        }

        $data = $request->only(['id', 'nama', 'st_kec_id']);
        $result = $service->update($data, $id);

        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Delete Setup Kelurahan
     *
     * @OA\Delete(
     *     path="/api/setup/kelurahan/{id}",
     *     tags={"setup/kelurahan"},
     *     operationId="setup/kelurahan/{id}/delete",
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
    public function delete(DeleteKelurahanService $service, $id)
    {
        $result = $service->delete($id);
        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Show Ref Setup Kelurahan information
     *
     * @OA\Get(
     *     path="/api/ref/setup/kelurahan",
     *     tags={"references"},
     *     operationId="ref/setup/kelurahan",
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
    public function getRef(DataKelurahanService $service)
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
    public function getFRef(DataKelurahanService $service, $kec)
    {
        $result = $service->getFRef($kec);
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }
}
