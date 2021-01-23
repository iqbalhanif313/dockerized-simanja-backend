<?php


namespace App\Http\Controllers\Setup;

use App\Http\Request\CreateKelurahanRequest;
use App\Http\Request\UpdateKelurahanRequest;
use App\Http\Controllers\Controller;
use Exception;
use App\Services\Kelurahan\KelurahanService;

class KelurahanController extends Controller
{
    protected $kelurahanService;

    public function __construct(KelurahanService $kelurahanService)
    {
        $this->kelurahanService = $kelurahanService;
    }

    /**
     * Show Setup Kelurahan information
     *
     * @OA\Get(
     *     path="/api/setup/kelurahan",
     *     tags={"setup/kelurahan"},
     *     operationId="setup/kelurahan",
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
            $data =  $this->kelurahanService->getAll();
            return $this->data($data);
        }catch (\Exception $e){
            return $this->handleErrorRequest($e->getMessage());
        }
    }

        /**
     * Show Setup Kelurahan Filter
     *
     * @OA\Get(
     *     path="/api/setup/kelurahan/filter/{st_kec_id}",
     *     tags={"setup/kelurahan"},
     *     operationId="setup/kelurahan/st_kec_id",
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
    public function filter($st_kec_id)
    {

        try{
            $data =  $this->kelurahanService->getByFilter($st_kec_id);
            return $this->data($data);
        }catch (\Exception $e){
            return $this->handleErrorRequest($e->getMessage());
        }
    }

        /**
     * Store Setup Kelurahan
     *
     * @OA\Post(
     *     path="/api/setup/kelurahan",
     *     tags={"setup/kelurahan"},
     *     operationId="setup/kelurahan/store",
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
    public function store(CreateKelurahanRequest $request)
    {
        $data = $request->only([
            'id',
            'nama',
            'st_kec_id'
        ]);
        try {
            $this->kelurahanService->saveData($data);
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }
        return $this->success("Kelurahan berhasil dibuat");
    }

    /**
     * Show Detail Setup Kelurahan
     *
     * @OA\Get(
     *     path="/api/setup/kelurahan/{id}",
     *     tags={"setup/kelurahan"},
     *     operationId="setup/kelurahan/{id}",
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
            return $this->data($this->kelurahanService->getById($id));
        } catch (Exception $e) {
            $this->handleErrorRequest($e);
        }
    }

    /**
     * Delete Setup Kelurahan
     *
     * @OA\Delete(
     *     path="/api/setup/kelurahan/{id}",
     *     tags={"setup/kelurahan"},
     *     operationId="setup/kelurahan/{id}/delete",
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
            $this->kelurahanService->deleteById($id);
            return $this->success("kelurahan berhasil dihapus");
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }
    }

    /**
     * Update Setup Kelurahan
     *
     * @OA\Put(
     *     path="/api/setup/kelurahan/{id}",
     *     tags={"setup/kelurahan"},
     *     operationId="setup/kelurahan/update",
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
    public function update(UpdateKelurahanRequest $request, $id)
    {
        $data = $request->only([
            'id',
            'nama',
            'st_kec_id'
        ]);

        try {
            if (!$this->kelurahanService->updateData($data, $id)) {
                return $this->handleBadRequest("Bad Request");
            }
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }

        return $this->success("Kelurahan berhasil diupdate");
    }

    /**
     * Show Ref Setup Kelurahan information
     *
     * @OA\Get(
     *     path="/api/ref/kelurahan",
     *     tags={"references"},
     *     operationId="ref/kelurahan",
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
            $result =  $this->kelurahanService->getRef();
        } catch (Exception $e) {
            $this->handleErrorRequest($e->getMessage());
        }
        return $this->data($result);
    }

}
