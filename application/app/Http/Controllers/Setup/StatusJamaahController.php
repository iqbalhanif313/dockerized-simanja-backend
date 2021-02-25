<?php


namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Http\Request\Setup\BaseCreateSetupRequest;
use App\Http\Request\Setup\BaseUpdateSetupRequest;
use App\Services\Setup\StatusJamaah\CreateStatusJamaahService;
use App\Services\Setup\StatusJamaah\DataStatusJamaahService;
use App\Services\Setup\StatusJamaah\DeleteStatusJamaahService;
use App\Services\Setup\StatusJamaah\UpdateStatusJamaahService;

class StatusJamaahController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Show Setup StatusJamaah information
     *
     * @OA\Get(
     *     path="/api/setup/status-jamaah",
     *     tags={"setup/status-jamaah"},
     *     operationId="setup/status-jamaah",
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
    public function index(DataStatusJamaahService $service)
    {
        $result = $service->getAll();
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Show Detail Setup StatusJamaah
     *
     * @OA\Get(
     *     path="/api/setup/status-jamaah/{id}",
     *     tags={"setup/status-jamaah"},
     *     operationId="setup/status-jamaah/{id}",
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
    public function show(DataStatusJamaahService $service, $id)
    {
        $result = $service->getByID($id);
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Store Setup StatusJamaah
     *
     * @OA\Post(
     *     path="/api/setup/status-jamaah",
     *     tags={"setup/status-jamaah"},
     *     operationId="setup/status-jamaah/store",
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
    public function store(CreateStatusJamaahService $service, BaseCreateSetupRequest $request)
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
     * Update Setup StatusJamaah
     *
     * @OA\Put(
     *     path="/api/setup/status-jamaah/{id}",
     *     tags={"setup/status-jamaah"},
     *     operationId="setup/status-jamaah/update",
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
    public function update(UpdateStatusJamaahService $service, BaseUpdateSetupRequest $request, $id)
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
     * Delete Setup StatusJamaah
     *
     * @OA\Delete(
     *     path="/api/setup/status-jamaah/{id}",
     *     tags={"setup/status-jamaah"},
     *     operationId="setup/status-jamaah/{id}/delete",
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
    public function delete(DeleteStatusJamaahService $service, $id)
    {
        $result = $service->delete($id);
        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Show Ref Setup Status Jamaah
     *
     * @OA\Get(
     *     path="/api/ref/setup/status-jamaah",
     *     tags={"references"},
     *     operationId="ref/setup/status-jamaah",
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
    public function getRef(DataStatusJamaahService $service)
    {
        $result = $service->getRef();
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }

}
