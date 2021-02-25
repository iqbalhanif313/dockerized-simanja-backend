<?php


namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Http\Request\Setup\Kabupaten\CreateKabupatenRequest;
use App\Http\Request\Setup\Kabupaten\UpdateKabupatenRequest;
use App\Services\Setup\Kabupaten\CreateKabupatenService;
use App\Services\Setup\Kabupaten\DataKabupatenService;
use App\Services\Setup\Kabupaten\DeleteKabupatenService;
use App\Services\Setup\Kabupaten\UpdateKabupatenService;

class KabupatenController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Show Setup Kabupaten information
     *
     * @OA\Get(
     *     path="/api/setup/kabupaten",
     *     tags={"setup/kabupaten"},
     *     operationId="setup/kabupaten",
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
    public function index(DataKabupatenService $service)
    {
        $result = $service->getAll();
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Show Detail Setup Kabupaten
     *
     * @OA\Get(
     *     path="/api/setup/kabupaten/{id}",
     *     tags={"setup/kabupaten"},
     *     operationId="setup/kabupaten/{id}",
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
    public function show(DataKabupatenService $service, $id)
    {
        $result = $service->getByID($id);
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Store Setup Kabupaten
     *
     * @OA\Post(
     *     path="/api/setup/kabupaten",
     *     tags={"setup/kabupaten"},
     *     operationId="setup/kabupaten/store",
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
    public function store(CreateKabupatenService $service, CreateKabupatenRequest $request)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->handleErrorRequest($request->validator->messages()->first());
        }

        $data = $request->only(['id', 'nama', 'st_provinsi_id']);
        $result = $service->create($data);

        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Update Setup Kabupaten
     *
     * @OA\Put(
     *     path="/api/setup/kabupaten/{id}",
     *     tags={"setup/kabupaten"},
     *     operationId="setup/kabupaten/update",
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
    public function update(UpdateKabupatenService $service, UpdateKabupatenRequest $request, $id)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->handleErrorRequest($request->validator->messages()->first());
        }

        $data = $request->only(['id', 'nama', 'st_provinsi_id']);
        $result = $service->update($data, $id);

        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Delete Setup Kabupaten
     *
     * @OA\Delete(
     *     path="/api/setup/kabupaten/{id}",
     *     tags={"setup/kabupaten"},
     *     operationId="setup/kabupaten/{id}/delete",
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
    public function delete(DeleteKabupatenService $service, $id)
    {
        $result = $service->delete($id);
        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Show Ref Setup Kabupaten information
     *
     * @OA\Get(
     *     path="/api/ref/setup/kabupaten",
     *     tags={"references"},
     *     operationId="ref/setup/kabupaten",
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
    public function getRef(DataKabupatenService $service)
    {
        $result = $service->getRef();
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Show Ref Setup Kabupaten by Provinsi information
     *
     * @OA\Get(
     *     path="/api/ref/setup/kabupaten/{prov}",
     *     tags={"references"},
     *     operationId="ref/setup/kabupaten/{prov}",
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
    public function getFRef(DataKabupatenService $service, $prov)
    {
        $result = $service->getFRef($prov);
        return $result->status ? $this->data($result->data)
        : $this->handleErrorRequest($result->message);
    }
}
