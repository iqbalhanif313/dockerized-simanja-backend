<?php


namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Http\Request\Setup\BaseCreateSetupRequest;
use App\Http\Request\Setup\BaseUpdateSetupRequest;
use App\Services\Setup\TipeMutasi\CreateTipeMutasiService;
use App\Services\Setup\TipeMutasi\DataTipeMutasiService;
use App\Services\Setup\TipeMutasi\DeleteTipeMutasiService;
use App\Services\Setup\TipeMutasi\UpdateTipeMutasiService;

class TipeMutasiController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Show Setup TipeMutasi information
     *
     * @OA\Get(
     *     path="/api/setup/tipe-mutasi",
     *     tags={"setup/tipe-mutasi"},
     *     operationId="setup/tipe-mutasi",
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
    public function index(DataTipeMutasiService $service)
    {
        $result = $service->getAll();
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Show Detail Setup TipeMutasi
     *
     * @OA\Get(
     *     path="/api/setup/tipe-mutasi/{id}",
     *     tags={"setup/tipe-mutasi"},
     *     operationId="setup/tipe-mutasi/{id}",
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
    public function show(DataTipeMutasiService $service, $id)
    {
        $result = $service->getByID($id);
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Store Setup TipeMutasi
     *
     * @OA\Post(
     *     path="/api/setup/tipe-mutasi",
     *     tags={"setup/tipe-mutasi"},
     *     operationId="setup/tipe-mutasi/store",
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
    public function store(CreateTipeMutasiService $service, BaseCreateSetupRequest $request)
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
     * Update Setup TipeMutasi
     *
     * @OA\Put(
     *     path="/api/setup/tipe-mutasi/{id}",
     *     tags={"setup/tipe-mutasin"},
     *     operationId="setup/tipe-mutasi/update",
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
    public function update(UpdateTipeMutasiService $service, BaseUpdateSetupRequest $request, $id)
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
     * Delete Setup TipeMutasi
     *
     * @OA\Delete(
     *     path="/api/setup/tipe-mutasi/{id}",
     *     tags={"setup/tipe-mutasi"},
     *     operationId="setup/tipe-mutasi/{id}/delete",
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
    public function delete(DeleteTipeMutasiService $service, $id)
    {
        $result = $service->delete($id);
        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Show Ref Setup TipeMutasi information
     *
     * @OA\Get(
     *     path="/api/ref/setup/tipe-mutasi",
     *     tags={"references"},
     *     operationId="ref/setup/tipe-mutasi",
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
    public function getRef(DataTipeMutasiService $service)
    {
        $result = $service->getRef();
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }
}
