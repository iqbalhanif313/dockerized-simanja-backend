<?php


namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Request\Master\Kepengurusan\CreateKepengurusanRequest;
use App\Http\Request\Master\Kepengurusan\UpdateKepengurusanRequest;
use App\Services\Master\Kepengurusan\CreateKepengurusanService;
use App\Services\Master\Kepengurusan\DataKepengurusanService;
use App\Services\Master\Kepengurusan\DeleteKepengurusanService;
use App\Services\Master\Kepengurusan\UpdateKepengurusanService;

class KepengurusanController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Show List Master Kepengurusan
     *
     * @OA\Get(
     *     path="/api/master/kepengurusan",
     *     tags={"master/kepengurusan"},
     *     operationId="master/kepengurusan",
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
     * Show Detail Master Kepengurusan
     *
     * @OA\Get(
     *     path="/api/master/kepengurusan/{id}",
     *     tags={"master/kepengurusan"},
     *     operationId="master/kepengurusan/{id}",
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
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Store Master Kepengurusan
     *
     * @OA\Post(
     *     path="/api/master/kepengurusan",
     *     tags={"master/kepengurusan"},
     *     operationId="master/kepengurusan/store",
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
    public function store(CreateKepengurusanService $service, CreateKepengurusanRequest $request)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->handleErrorRequest($request->validator->messages()->first());
        }

        $data = $request->only([
            'id',
            'nama',
            'st_kepengurusan_id',
            'st_level_id',
        ]);

        $result = $service->create($data);

        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Update Master Kepengurusan
     *
     * @OA\Put(
     *     path="/api/master/kepengurusan/{id}",
     *     tags={"master/kepengurusan"},
     *     operationId="master/kepengurusan/update",
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
    public function update(UpdateKepengurusanService $service, UpdateKepengurusanRequest $request, $id)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->handleErrorRequest($request->validator->messages()->first());
        }

        $data = $request->only([
            'id',
            'nama',
            'st_kepengurusan_id',
            'st_level_id',
        ]);

        $result = $service->update($data, $id);

        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Delete Master Kepengurusan
     *
     * @OA\Delete(
     *     path="/api/master/kepengurusan/{id}",
     *     tags={"master/kepengurusan"},
     *     operationId="master/kepengurusan/{id}/delete",
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
     * Show Ref Master Kepengurusan
     *
     * @OA\Get(
     *     path="/api/ref/master/kepengurusan",
     *     tags={"references"},
     *     operationId="ref/master/kepengurusan",
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
