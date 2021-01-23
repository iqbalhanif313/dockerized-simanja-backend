<?php


namespace App\Http\Controllers\Setup;

use App\Http\Request\CreateTipeMutasiRequest;
use App\Http\Request\UpdateTipeMutasiRequest;
use App\Http\Controllers\Controller;
use Exception;
use App\Services\TipeMutasi\TipeMutasiService;

class TipeMutasiController extends Controller
{
    protected $tipeMutasiService;

    public function __construct(TipeMutasiService $tipeMutasiService)
    {
        $this->tipeMutasiService = $tipeMutasiService;
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

    public function index()
    {
        $result = [];
        try {
            $result =  $this->tipeMutasiService->getAll();
        } catch (Exception $e) {
            $this->handleErrorRequest($e->getMessage());
        }
        return $this->data($result);
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
    public function store(CreateTipeMutasiRequest $request)
    {
        $data = $request->only([
            'id',
            'nama',
        ]);
        try {
            $this->tipeMutasiService->saveData($data);
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }
        return $this->success("TipeMutasi berhasil dibuat");
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
    public function show($id)
    {
        try {
            return $this->data($this->tipeMutasiService->getById($id));
        } catch (Exception $e) {
            $this->handleErrorRequest($e);
        }
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
    public function delete($id)
    {
        try {
            $this->tipeMutasiService->deleteById($id);
            return $this->success("Status Kehadiran berhasil dihapus");
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }
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
    public function update(UpdateTipeMutasiRequest $request, $id)
    {
        $data = $request->only([
            'id',
            'nama'
        ]);

        try {
            if (!$this->tipeMutasiService->updateData($data, $id)) {
                return $this->handleBadRequest("Bad Request");
            }
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }

        return $this->success("Tipe Mutasi berhasil diupdate");
    }

    /**
     * Show Ref Setup TipeMutasi information
     *
     * @OA\Get(
     *     path="/api/ref/tipe-mutasi",
     *     tags={"references"},
     *     operationId="ref/tipe-mutasi",
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
            $result =  $this->tipeMutasiService->getRef();
        } catch (Exception $e) {
            $this->handleErrorRequest($e->getMessage());
        }
        return $this->data($result);
    }
}
