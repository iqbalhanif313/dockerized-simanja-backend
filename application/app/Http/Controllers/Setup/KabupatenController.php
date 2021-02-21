<?php


namespace App\Http\Controllers\Setup;

use App\Http\Request\CreateKabupatenRequest;
use App\Http\Request\UpdateKabupatenRequest;
use App\Http\Controllers\Controller;
use Exception;
use App\Services\Kabupaten\KabupatenService;

class KabupatenController extends Controller
{
    protected $service;

    public function __construct(KabupatenService $service)
    {
        $this->service = $service;
    }


    /**
     * Show Setup Kabupaten information
     *
     * @OA\Get(
     *     path="/api/setup/kabupaten",
     *     tags={"setup/kabupaten"},
     *     operationId="setup/kabupaten",
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
            $data =  $this->service->getAll();
            return $this->data($data);
        }catch (\Exception $e){
            return $this->handleErrorRequest($e->getMessage());
        }
    }


    /**
     * Show Setup Kabupaten Filter
     *
     * @OA\Get(
     *     path="/api/setup/kabupaten/filter/{st_provinsi_id}",
     *     tags={"setup/kabupaten"},
     *     operationId="setup/kabupaten/st_provinsi_id",
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
    public function filter($st_kabupaten_id)
    {

        try{
            $data =  $this->service->getByFilter($st_kabupaten_id);
            return $this->data($data);
        }catch (\Exception $e){
            return $this->handleErrorRequest($e->getMessage());
        }
    }

        /**
     * Store Setup Kabupaten
     *
     * @OA\Post(
     *     path="/api/setup/kabupaten",
     *     tags={"setup/kabupaten"},
     *     operationId="setup/kabupaten/store",
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
    public function store(CreateKabupatenRequest $request)
    {
        $data = $request->only([
            'id',
            'nama',
            'st_provinsi_id'
        ]);
        try {
            $this->service->saveData($data);
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }
        return $this->success("Kabupaten berhasil dibuat");
    }

    /**
     * Show Detail Setup Kabupaten
     *
     * @OA\Get(
     *     path="/api/setup/kabupaten/{id}",
     *     tags={"setup/kabupaten"},
     *     operationId="setup/kabupaten/{id}",
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
            return $this->data($this->service->getById($id));
        } catch (Exception $e) {
            $this->handleErrorRequest($e);
        }
    }

    /**
     * Delete Setup Kabupaten
     *
     * @OA\Delete(
     *     path="/api/setup/kabupaten/{id}",
     *     tags={"setup/kabupaten"},
     *     operationId="setup/kabupaten/{id}/delete",
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
            $this->service->deleteById($id);
            return $this->success("kabupaten berhasil dihapus");
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }
    }

    /**
     * Update Setup Kabupaten
     *
     * @OA\Put(
     *     path="/api/setup/kabupaten/{id}",
     *     tags={"setup/kabupaten"},
     *     operationId="setup/kabupaten/update",
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
    public function update(UpdateKabupatenRequest $request, $id)
    {
        $data = $request->only([
            'id',
            'nama',
            'st_provinsi_id'
        ]);

        try {
            if (!$this->service->updateData($data, $id)) {
                return $this->handleBadRequest("Bad Request");
            }
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }

        return $this->success("Kabupaten berhasil diupdate");
    }

    /**
     * Show Ref Setup Kabupaten information
     *
     * @OA\Get(
     *     path="/api/ref/setup/kabupaten",
     *     tags={"references"},
     *     operationId="ref/setup/kabupaten",
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

    public function getRef(KabupatenService $service, $prov)
    {
        try {
            $result = $service->getRef($prov);
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }
        return $this->data($result);
    }
}
