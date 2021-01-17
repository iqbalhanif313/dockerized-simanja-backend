<?php


namespace App\Http\Controllers\Setup;

use App\Http\Request\CreateProvinsiRequest;
use App\Http\Request\UpdateProvinsiRequest;
use App\Http\Controllers\Controller;
use Exception;
use App\Services\Provinsi\ProvinsiService;

class ProvinsiController extends Controller
{
    protected $provinsiService;

    public function __construct(ProvinsiService $provinsiService)
    {
        $this->provinsiService = $provinsiService;
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

    public function index()
    {
        $result = [];
        try {
            $result =  $this->provinsiService->getAll();
        } catch (Exception $e) {
            $this->handleErrorRequest($e->getMessage());
        }
        return $this->data($result);
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
    public function store(CreateProvinsiRequest $request)
    {
        $data = $request->only([
            'id',
            'nama',
        ]);
        try {
            $this->provinsiService->saveData($data);
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }
        return $this->success("Provinsi berhasil dibuat");
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
    public function show($id)
    {
        try {
            return $this->data($this->provinsiService->getById($id));
        } catch (Exception $e) {
            $this->handleErrorRequest($e);
        }
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
    public function delete($id)
    {
        try {
            $this->provinsiService->deleteById($id);
            return $this->success("provinsi berhasil dihapus");
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }
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
    public function update(UpdateProvinsiRequest $request, $id)
    {
        $data = $request->only([
            'id',
            'nama'
        ]);

        try {
            if (!$this->provinsiService->updateData($data, $id)) {
                return $this->handleBadRequest("Bad Request");
            }
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }

        return $this->success("Provinsi berhasil diupdate");
    }
}
