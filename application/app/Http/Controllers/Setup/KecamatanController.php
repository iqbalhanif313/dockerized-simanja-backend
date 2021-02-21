<?php


namespace App\Http\Controllers\Setup;

use App\Http\Request\CreateKecamatanRequest;
use App\Http\Request\UpdateKecamatanRequest;
use App\Http\Controllers\Controller;
use Exception;
use App\Services\Kecamatan\KecamatanService;

class KecamatanController extends Controller
{
    protected $kecamatanService;

    public function __construct(KecamatanService $kecamatanService)
    {
        $this->kecamatanService = $kecamatanService;
    }

    /**
     * Show Setup Kecamatan information
     *
     * @OA\Get(
     *     path="/api/setup/kecamatan",
     *     tags={"setup/kecamatan"},
     *     operationId="setup/kecamatan",
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
        try{
            $data =  $this->kecamatanService->getAll();
            return $this->data($data);
        }catch (\Exception $e){
            return $this->handleErrorRequest($e->getMessage());
        }
    }


    /**
     * Show Setup Kecamatan Filter
     *
     * @OA\Get(
     *     path="/api/setup/kecamatan/filter/{st_kab_id}",
     *     tags={"setup/kecamatan"},
     *     operationId="setup/kecamatan/st_kab_id",
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
    public function filter($st_kab_id)
    {

        try{
            $data =  $this->kecamatanService->getByFilter($st_kab_id);
            return $this->data($data);
        }catch (\Exception $e){
            return $this->handleErrorRequest($e->getMessage());
        }
    }

        /**
     * Store Setup Kecamatan
     *
     * @OA\Post(
     *     path="/api/setup/kecamatan",
     *     tags={"setup/kecamatan"},
     *     operationId="setup/kecamatan/store",
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
    public function store(CreateKecamatanRequest $request)
    {
        $data = $request->only([
            'id',
            'nama',
            'st_kab_id'
        ]);
        try {
            $this->kecamatanService->saveData($data);
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }
        return $this->success("Kecamatan berhasil dibuat");
    }

    /**
     * Show Detail Setup Kecamatan
     *
     * @OA\Get(
     *     path="/api/setup/kecamatan/{id}",
     *     tags={"setup/kecamatan"},
     *     operationId="setup/kecamatan/{id}",
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
            return $this->data($this->kecamatanService->getById($id));
        } catch (Exception $e) {
            $this->handleErrorRequest($e);
        }
    }

    /**
     * Delete Setup Kecamatan
     *
     * @OA\Delete(
     *     path="/api/setup/kecamatan/{id}",
     *     tags={"setup/kecamatan"},
     *     operationId="setup/kecamatan/{id}/delete",
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
            $this->kecamatanService->deleteById($id);
            return $this->success("kecamatan berhasil dihapus");
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }
    }

    /**
     * Update Setup Kecamatan
     *
     * @OA\Put(
     *     path="/api/setup/kecamatan/{id}",
     *     tags={"setup/kecamatan"},
     *     operationId="setup/kecamatan/update",
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
    public function update(UpdateKecamatanRequest $request, $id)
    {
        $data = $request->only([
            'id',
            'nama',
            'st_kab_id'
        ]);

        try {
            if (!$this->kecamatanService->updateData($data, $id)) {
                return $this->handleBadRequest("Bad Request");
            }
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }

        return $this->success("Kecamatan berhasil diupdate");
    }

    /**
     * Show Ref Setup Kecamatan information
     *
     * @OA\Get(
     *     path="/api/ref/setup/kecamatan",
     *     tags={"references"},
     *     operationId="ref/setup/kecamatan",
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

    public function getRef(KecamatanService $service, $kab)
    {
        try {
            $result = $service->getRef($kab);
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }
        return $this->data($result);
    }
}
