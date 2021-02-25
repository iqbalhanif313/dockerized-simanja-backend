<?php


namespace App\Http\Controllers\Master;

use App\Http\Request\Master\Kelompok\CreateKelompokRequest;
use App\Http\Request\Master\Kelompok\UpdateKelompokRequest;
use App\Services\Master\Kelompok\CreateKelompokService;
use App\Services\Master\Kelompok\DataKelompokService;
use App\Services\Master\Kelompok\DeleteKelompokService;
use App\Services\Master\Kelompok\UpdateKelompokService;
use App\Http\Controllers\Controller;

class KelompokController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Show List Kelompok
     *
     * @OA\Get(
     *     path="/api/master/kelompok",
     *     tags={"master/kelompok"},
     *     operationId="master/kelompok",
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
    public function index(DataKelompokService $service)
    {
        $result = $service->getAll();
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Show Detail Kelompok
     *
     * @OA\Get(
     *     path="/api/master/kelompok/id",
     *     tags={"master/kelompok"},
     *     operationId="master/kelompok/id",
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
    public function show(DataKelompokService $service, $id)
    {
        $result = $service->getByID($id);
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Store Master Kelompok
     *
     * @OA\Post(
     *     path="/api/master/kelompok",
     *     tags={"master/kelompok"},
     *     operationId="master/kelompok/store",
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
     *    					example="NGT",
     *                  ),
     *                  @OA\Property(property="st_desa_id",
     *    					type="string",
     *    					example="NGD",
     *                  ),
     *    				 @OA\Property(property="nama",
     *    					type="string",
     *    					example="Nginden Timur",
     *    					description=""
     *    				),
     *    				 @OA\Property(property="alamat",
     *    					type="string",
     *    					example="Jalan Nginden gang 3 Nomor 222 Surabaya",
     *    					description=""
     *                  ),
     *    			),
     *    		),
     *    	),
     *   ),
     */
    public function store(CreateKelompokService $service, CreateKelompokRequest $request)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->handleErrorRequest($request->validator->messages()->first());
        }

        $data = $request->only([
            'id',
            'nama',
            'alamat',
            'st_desa_id',
        ]);

        $result = $service->create($data);

        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Update Master Kelompok
     *
     * @OA\Put(
     *     path="/api/master/kelompok/{id}",
     *     tags={"master/kelompok"},
     *     operationId="master/kelompok/update",
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
     *    			mediaType="application/x-www-form-urlencoded",
     *    			@OA\Schema(
     *                  @OA\Property(property="id",
     *    					type="string",
     *    					example="NGT",
     *                  ),
     *                  @OA\Property(property="st_desa_id",
     *    					type="string",
     *    					example="NGD",
     *                  ),
     *    				 @OA\Property(property="nama",
     *    					type="string",
     *    					example="Nginden Timur",
     *    					description=""
     *    				),
     *    				 @OA\Property(property="alamat",
     *    					type="string",
     *    					example="Jalan Nginden gang 3 Nomor 222 Surabaya",
     *    					description=""
     *                  ),
     *    			),
     *    		),
     *    	),
     *   ),
     */
    public function update(UpdateKelompokService $service, UpdateKelompokRequest $request, $id)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->handleErrorRequest($request->validator->messages()->first());
        }

        $data = $request->only([
            'id',
            'st_desa_id',
            'nama',
            'alamat'
        ]);

        $result = $service->update($data, $id);

        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Delete Master Kegiatan
     *
     * @OA\Delete(
     *     path="/api/master/jamaah/{nik}",
     *     tags={"master/jamaah"},
     *     operationId="master/jamaah/{nik}/delete",
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
    public function delete(DeleteKelompokService $service, $id) {
        $result = $service->delete($id);
        return $result->status ? $this->success($result->message)
            : $this->handleErrorRequest($result->message);
    }

    /**
     * Show Ref Setup Kelompok information
     *
     * @OA\Get(
     *     path="/api/ref/kelompok",
     *     tags={"references"},
     *     operationId="ref/kelompok",
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
    public function getRef(DataKelompokService $service)
    {
        $result = $service->getRef();
        return $result->status ? $this->data($result->data)
            : $this->handleErrorRequest($result->message);
    }
}
