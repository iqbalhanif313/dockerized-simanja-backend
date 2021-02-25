<?php


namespace App\Http\Controllers\Trans;

use App\Http\Controllers\Controller;
use App\Http\Request\Trans\Kepengurusan\CreateKepengurusanRequest;
use App\Http\Request\Trans\Kepengurusan\UpdateKepengurusanRequest;
use App\Services\Trans\Kepengurusan\CreateKepengurusanService;
use App\Services\Trans\Kepengurusan\DataKepengurusanService;
use App\Services\Trans\Kepengurusan\DeleteKepengurusanService;
use App\Services\Trans\Kepengurusan\UpdateKepengurusanService;

class KepengurusanController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Show List Trans Kepengurusan
     *
     * @OA\Get(
     *     path="/api/trans/kepengurusan",
     *     tags={"trans/kepengurusan"},
     *     operationId="trans/kepengurusan",
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
     * Show Detail Trans Kepengurusan
     *
     * @OA\Get(
     *     path="/api/trans/kepengurusan/{id}",
     *     tags={"trans/kepengurusan"},
     *     operationId="trans/kepengurusan/id",
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
     * Store Trans Kepengurusan
     *
     * @OA\Post(
     *     path="/api/trans/kepengurusan",
     *     tags={"trans/kepengurusan"},
     *     operationId="trans/kepengurusan/store",
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
     *                  @OA\Property(property="md_jamaah_nik",
     *    					type="string",
     *    					example="",
     *                  ),
     *                  @OA\Property(property="md_kepengurusan_id",
     *    					type="string",
     *    					example="",
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

        $data = $request->only(['md_jamaah_nik', 'md_kepengurusan_id']);
        $result = $service->create($data);

        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Update Trans Kepengurusan
     *
     * @OA\Put(
     *     path="/api/trans/kepengurusan/{id}",
     *     tags={"trans/kepengurusan"},
     *     operationId="trans/kepengurusan/update",
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
     *                  @OA\Property(property="md_jamaah_nik",
     *    					type="string",
     *    					example="",
     *                  ),
     *                  @OA\Property(property="md_kepengurusan_id",
     *    					type="string",
     *    					example="",
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

        $data = $request->only(['md_jamaah_nik', 'md_kepengurusan_id']);
        $result = $service->update($data, $id);

        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Delete Trans Kepengurusan
     *
     * @OA\Delete(
     *     path="/api/trans/kepengurusan/{id}",
     *     tags={"trans/kepengurusan"},
     *     operationId="trans/kepengurusan/{id}/delete",
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
    public function delete(DeleteKepengurusanService $service, $id) {
        $result = $service->delete($id);
        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
    }
}
