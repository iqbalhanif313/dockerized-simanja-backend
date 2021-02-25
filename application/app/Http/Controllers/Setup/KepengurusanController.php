<?php


namespace App\Http\Controllers\Setup;


use App\Http\Controllers\Controller;
use App\Http\Request\Setup\BaseCreateSetupRequest;
use App\Http\Request\Setup\BaseUpdateSetupRequest;
use App\Services\Setup\Kepengurusan\CreateKepengurusanService;
use App\Services\Setup\Kepengurusan\DataKepengurusanService;
use App\Services\Setup\Kepengurusan\DeleteKepengurusanService;
use App\Services\Setup\Kepengurusan\UpdateKepengurusanService;

class KepengurusanController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Show List Setup Kepengurusan
     *
     * @OA\Get(
     *     path="/api/setup/kepengurusan",
     *     tags={"setup/kepengurusan"},
     *     operationId="setup/kepengurusan",
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
    public function index(DataKepengurusanService $service)
    {
        $result = $service->getAll();
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Show Detail Setup Kepengurusan
     *
     * @OA\Get(
     *     path="/api/setup/kepengurusan/{id}",
     *     tags={"setup/kepengurusan"},
     *     operationId="setup/kepengurusan/{id}",
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
    public function show(DataKepengurusanService $service, $id)
    {
        $result = $service->getByID($id);
        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Store Setup Kepengurusan
     *
     * @OA\Post(
     *     path="/api/setup/kepengurusan",
     *     tags={"setup/kepengurusan"},
     *     operationId="setup/kepengurusan/store",
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
    public function store(CreateKepengurusanService $service, BaseCreateSetupRequest $request)
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
     * Update Setup Kepengurusan
     *
     * @OA\Put(
     *     path="/api/setup/kepengurusan/{id}",
     *     tags={"setup/kepengurusan"},
     *     operationId="setup/kepengurusan/update",
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
    public function update(UpdateKepengurusanService $service, BaseUpdateSetupRequest $request, $id)
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
     * Delete Setup Kepengurusan
     *
     * @OA\Delete(
     *     path="/api/setup/kepengurusan/{id}",
     *     tags={"setup/kepengurusan"},
     *     operationId="setup/kepengurusan/{id}/delete",
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
    public function delete(DeleteKepengurusanService $service, $id)
    {
        $result = $service->delete($id);
        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Show Ref Setup Kepengurusan
     *
     * @OA\Get(
     *     path="/api/ref/setup/kepengurusan",
     *     tags={"references"},
     *     operationId="ref/setup/kepengurusan",
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
    public function getRef(DataKepengurusanService $service)
    {
        $result = $service->getRef();
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }
}
