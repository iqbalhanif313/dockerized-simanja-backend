<?php


namespace App\Http\Controllers\Setup;

use App\Http\Request\CreateStatusJamaahRequest;
use App\Http\Request\UpdateStatusJamaahRequest;
use App\Http\Controllers\Controller;
use Exception;
use App\Services\StatusJamaah\StatusJamaahService;

class StatusJamaahController extends Controller
{
    protected $statusJamaahService;

    public function __construct(StatusJamaahService $statusJamaahService)
    {
        $this->statusJamaahService = $statusJamaahService;
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

    public function index()
    {
        $result = [];
        try {
            $result =  $this->statusJamaahService->getAll();
        } catch (Exception $e) {
            $this->handleErrorRequest( $e->getMessage());
        }
        return $this->data($result);
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
    public function store(CreateStatusJamaahRequest $request)
    {
        $data = $request->only([
            'id',
            'nama',
        ]);
        try {
            $this->statusJamaahService->saveData($data);
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }
        return $this->success("Status Jamaah berhasil dibuat");
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
    public function show($id)
    {
        try {
            return $this->data($this->statusJamaahService->getById($id));
        } catch (Exception $e) {
            $this->handleErrorRequest($e);
        }
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
    public function delete($id)
    {
        try {
            $this->statusJamaahService->deleteById($id);
            return $this->success("status-jamaah berhasil dihapus");
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }
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
    public function update(UpdateStatusJamaahRequest $request, $id)
    {
        $data = $request->only([
            'id',
            'nama'
        ]);

        try {
            if (!$this->statusJamaahService->updateData($data, $id)) {
                return $this->handleBadRequest("Bad Request");
            }
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }

        return $this->success("Status Jamaah berhasil diupdate");
    }

}
