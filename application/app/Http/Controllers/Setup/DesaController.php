<?php


namespace App\Http\Controllers\Setup;

use App\Http\Request\CreateDesaRequest;
use App\Http\Request\UpdateDesaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use DB;
use Exception;
use App\Services\Desa\DesaService;

class DesaController extends Controller
{

    protected $desaService;

    public function __construct(DesaService $desaService)
    {
        $this->desaService = $desaService;
    }
    /**
     * Show List Setup Desa
     *
     * @OA\Get(
     *     path="/api/setup/desa",
     *     tags={"setup/desa"},
     *     operationId="setup/desa",
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
            $result =  $this->desaService->getAll();
        } catch (Exception $e) {
            $this->handleErrorRequest( $e->getMessage());
        }
        return $this->data($result);
    }

    /**
     * Store Setup Desa
     *
     * @OA\Post(
     *     path="/api/setup/desa",
     *     tags={"setup/desa"},
     *     operationId="setup/desa/store",
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
    public function store(CreateDesaRequest $request)
    {
        $data = $request->only([
            'nama',
        ]);
        try {
            $this->desaService->saveData($data);
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }
        return $this->success("desa berhasil dibuat");
    }

        /**
     * Show Detail Setup Desa
     *
     * @OA\Get(
     *     path="/api/setup/desa/{id}",
     *     tags={"setup/desa"},
     *     operationId="setup/desa/{id}",
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
            return $this->data($this->desaService->getById($id));
        } catch (Exception $e) {
            $this->handleErrorRequest($e);
        }
    }

    public function delete($id)
    {
        try {
            $this->desaService->deleteById($id);
            return $this->success("desa berhasil dihapus");
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }
    }

     /**
     * Update Setup Desa
     *
     * @OA\Put(
     *     path="/api/setup/desa/{id}",
     *     tags={"setup/desa"},
     *     operationId="setup/desa/update",
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
    public function update(UpdateDesaRequest $request, $id)
    {
        $data = $request->only([
            'id',
            'nama'
        ]);

        try {
            if(!$this->desaService->updateData($data, $id)){
                return $this->handleBadRequest("Bad Request");
            }
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }

        return $this->success("Desa berhasil diupdate");

    }

}
