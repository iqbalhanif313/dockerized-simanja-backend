<?php


namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Http\Request\Setup\BaseCreateSetupRequest;
use App\Http\Request\Setup\BaseUpdateSetupRequest;
use App\Services\Setup\Provinsi\CreateProvinsiService;
use App\Services\Setup\Provinsi\DataProvinsiService;
use App\Services\Setup\Provinsi\DeleteProvinsiService;
use App\Services\Setup\Provinsi\UpdateProvinsiService;

class ProvinsiController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Show Setup Provinsi information
     *
     * @OA\Get(
     *     path="/api/setup/provinsi",
     *     tags={"setup/provinsi"},
     *     operationId="provinsi",
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
    public function index(DataProvinsiService $service)
    {
        $result = $service->getAll();
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Show Detail Setup Provinsi
     *
     * @OA\Get(
     *     path="/api/setup/provinsi/{id}",
     *     tags={"setup/provinsi"},
     *     operationId="setup/provinsi/{id}",
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
    public function show(DataProvinsiService $service, $id)
    {
        $result = $service->getByID($id);
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Store Setup Provinsi
     *
     * @OA\Post(
     *     path="/api/setup/provinsi",
     *     tags={"setup/provinsi"},
     *     operationId="setup/provinsi/store",
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
    public function store(CreateProvinsiService $service, BaseCreateSetupRequest $request)
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
     * Update Setup Provinsi
     *
     * @OA\Put(
     *     path="/api/setup/provinsi/{id}",
     *     tags={"setup/provinsi"},
     *     operationId="setup/provinsi/update",
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
    public function update(UpdateProvinsiService $service, BaseUpdateSetupRequest $request, $id)
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
     * Delete Setup Provinsi
     *
     * @OA\Delete(
     *     path="/api/setup/provinsi/{id}",
     *     tags={"setup/provinsi"},
     *     operationId="setup/provinsi/{id}/delete",
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
    public function delete(DeleteProvinsiService $service, $id)
    {
        $result = $service->delete($id);
        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Show Ref Setup Provinsi information
     *
     * @OA\Get(
     *     path="/api/ref/setup/provinsi",
     *     tags={"references"},
     *     operationId="ref/setup/provinsi",
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
    public function getRef(DataProvinsiService $service)
    {
        $result = $service->getRef();
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }
}
