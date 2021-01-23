<?php


namespace App\Http\Controllers\Setup;

use App\Http\Request\CreateStatusKehadiranRequest;
use App\Http\Request\UpdateStatusKehadiranRequest;
use App\Http\Controllers\Controller;
use Exception;
use App\Services\StatusKehadiran\StatusKehadiranService;

class StatusKehadiranController extends Controller
{
    protected $statusKehadiranService;

    public function __construct(StatusKehadiranService $statusKehadiranService)
    {
        $this->statusKehadiranService = $statusKehadiranService;
    }

    /**
     * Show Setup StatusKehadiran information
     *
     * @OA\Get(
     *     path="/api/setup/status-kehadiran",
     *     tags={"setup/status-kehadiran"},
     *     operationId="setup/status-kehadiran",
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
            $result =  $this->statusKehadiranService->getAll();
        } catch (Exception $e) {
            $this->handleErrorRequest($e->getMessage());
        }
        return $this->data($result);
    }

    /**
     * Store Setup StatusKehadiran
     *
     * @OA\Post(
     *     path="/api/setup/status-kehadiran",
     *     tags={"setup/status-kehadiran"},
     *     operationId="setup/status-kehadiran/store",
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
    public function store(CreateStatusKehadiranRequest $request)
    {
        $data = $request->only([
            'id',
            'nama',
        ]);
        try {
            $this->statusKehadiranService->saveData($data);
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }
        return $this->success("StatusKehadiran berhasil dibuat");
    }

    /**
     * Show Detail Setup StatusKehadiran
     *
     * @OA\Get(
     *     path="/api/setup/status-kehadiran/{id}",
     *     tags={"setup/status-kehadiran"},
     *     operationId="setup/status-kehadiran/{id}",
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
            return $this->data($this->statusKehadiranService->getById($id));
        } catch (Exception $e) {
            $this->handleErrorRequest($e);
        }
    }

    /**
     * Delete Setup StatusKehadiran
     *
     * @OA\Delete(
     *     path="/api/setup/status-kehadiran/{id}",
     *     tags={"setup/status-kehadiran"},
     *     operationId="setup/status-kehadiran/{id}/delete",
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
            $this->statusKehadiranService->deleteById($id);
            return $this->success("Status Kehadiran berhasil dihapus");
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }
    }

    /**
     * Update Setup StatusKehadiran
     *
     * @OA\Put(
     *     path="/api/setup/status-kehadiran/{id}",
     *     tags={"setup/status-kehadirann"},
     *     operationId="setup/status-kehadiran/update",
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
    public function update(UpdateStatusKehadiranRequest $request, $id)
    {
        $data = $request->only([
            'id',
            'nama'
        ]);

        try {
            if (!$this->statusKehadiranService->updateData($data, $id)) {
                return $this->handleBadRequest("Bad Request");
            }
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }

        return $this->success("StatusKehadiran berhasil diupdate");
    }

    /**
     * Show Ref Setup StatusKehadiran information
     *
     * @OA\Get(
     *     path="/api/ref/status-kehadiran",
     *     tags={"references"},
     *     operationId="ref/status-kehadiran",
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

    public function getRef()
    {
        $result = [];
        try {
            $result =  $this->statusKehadiranService->getRef();
        } catch (Exception $e) {
            $this->handleErrorRequest($e->getMessage());
        }
        return $this->data($result);
    }
}
