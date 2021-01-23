<?php


namespace App\Http\Controllers\Setup;

use App\Http\Request\CreateKategoriJamaahRequest;
use App\Http\Request\UpdateKategoriJamaahRequest;
use App\Http\Controllers\Controller;
use Exception;
use App\Services\KategoriJamaah\KategoriJamaahService;

class KategoriJamaahController extends Controller
{
    protected $kategoriJamaahService;

    public function __construct(KategoriJamaahService $kategoriJamaahService)
    {
        $this->kategoriJamaahService = $kategoriJamaahService;
    }

    /**
     * Show Setup Jenis Kegiatan information
     *
     * @OA\Get(
     *     path="/api/setup/kategori-jamaah",
     *     tags={"setup/kategori-jamaah"},
     *     operationId="setup/kategori-jamaah",
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
            $result =  $this->kategoriJamaahService->getAll();
        } catch (Exception $e) {
            $this->handleErrorRequest($e->getMessage());
        }
        return $this->data($result);
    }

    /**
     * Store Setup KategoriJamaah
     *
     * @OA\Post(
     *     path="/api/setup/kategori-jamaah",
     *     tags={"setup/kategori-jamaah"},
     *     operationId="setup/kategori-jamaah/store",
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
    public function store(CreateKategoriJamaahRequest $request)
    {
        $data = $request->only([
            'id',
            'nama',
        ]);
        try {
            $this->kategoriJamaahService->saveData($data);
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }
        return $this->success("KategoriJamaah berhasil dibuat");
    }

    /**
     * Show Detail Setup KategoriJamaah
     *
     * @OA\Get(
     *     path="/api/setup/kategori-jamaah/{id}",
     *     tags={"setup/kategori-jamaah"},
     *     operationId="setup/kategori-jamaah/{id}",
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
            return $this->data($this->kategoriJamaahService->getById($id));
        } catch (Exception $e) {
            $this->handleErrorRequest($e);
        }
    }

    /**
     * Delete Setup KategoriJamaah
     *
     * @OA\Delete(
     *     path="/api/setup/kategori-jamaah/{id}",
     *     tags={"setup/kategori-jamaah"},
     *     operationId="setup/kategori-jamaah/{id}/delete",
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
            $this->kategoriJamaahService->deleteById($id);
            return $this->success("kategori jamaah berhasil dihapus");
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }
    }

    /**
     * Update Setup KategoriJamaah
     *
     * @OA\Put(
     *     path="/api/setup/kategori-jamaah/{id}",
     *     tags={"setup/kategori-jamaah"},
     *     operationId="setup/kategori-jamaah/update",
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
    public function update(UpdateKategoriJamaahRequest $request, $id)
    {
        $data = $request->only([
            'id',
            'nama'
        ]);

        try {
            if (!$this->kategoriJamaahService->updateData($data, $id)) {
                return $this->handleBadRequest("Bad Request");
            }
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }

        return $this->success("KategoriJamaah berhasil diupdate");
    }

    /**
     * Show Ref Setup Kategori Jamaah information
     *
     * @OA\Get(
     *     path="/api/ref/kategori-jamaah",
     *     tags={"references"},
     *     operationId="ref/kategori-jamaah",
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
            $result =  $this->kategoriJamaahService->getRef();
        } catch (Exception $e) {
            $this->handleErrorRequest($e->getMessage());
        }
        return $this->data($result);
    }
}
