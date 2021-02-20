<?php


namespace App\Http\Controllers\Trans;

use App\Helpers\DateTimeHelper;
use App\Helpers\ResponseHelper;
use App\Services\Jadwal\JadwalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use DB;
use Exception;

class JadwalController extends Controller
{

    protected $jadwalService;

    public function __construct(JadwalService $jadwalService)
    {
        $this->jadwalService = $jadwalService;
    }
    /**
     * Show List Trans Jadwal
     *
     * @OA\Get(
     *     path="/api/trans/jadwal",
     *     tags={"trans/jadwal"},
     *     operationId="trans/jadwal",
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
        $result = ['status' => 200];

        try {
            $result['data'] = $this->jadwalService->getAll();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    /**
     * Store Trans Jadwal
     *
     * @OA\Post(
     *     path="/api/trans/jadwal",
     *     tags={"trans/jadwal"},
     *     operationId="trans/jadwal/store",
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
     *                  @OA\Property(property="tanggal",
     *    					type="date",
     *    					example="2020-12-22",
     *                  ),
     *                  @OA\Property(property="jam_mulai",
     *    					type="time",
     *    					example="19:30:00",
     *                  ),
     *    				 @OA\Property(property="jam_selesai",
     *    					type="time",
     *    					example="21:30:00",
     *    					description=""
     *    				),
     *    				 @OA\Property(property="md_kegiatan_id",
     *    					type="string",
     *    					example="P-U-DRH",
     *    					description=""
     *                  ),
     *    			),
     *    		),
     *    	),
     *   ),
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'tanggal',
            'jam_mulai',
            'jam_selesai',
            'md_kegiatan_id'
        ]);

        $result = ['status' => 200];

        try {
            $result['data'] = $this->jadwalService->saveData($data);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    /**
     * Show Detail Trans Jadwal
     *
     * @OA\Get(
     *     path="/api/trans/jadwal/{id}",
     *     tags={"trans/jadwal"},
     *     operationId="trans/jadwal/id",
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
        $result = ['status' => 200];

        try {
            $result['data'] = $this->jadwalService->getById($id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }

     /**
     * Update Trans Jadwal
     *
     * @OA\Put(
     *     path="/api/trans/jadwal/{id}",
     *     tags={"trans/jadwal"},
     *     operationId="trans/jadwal/update",
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
     *                  @OA\Property(property="tanggal",
     *    					type="date",
     *    					example="2020-12-22",
     *                  ),
     *                  @OA\Property(property="jam_mulai",
     *    					type="time",
     *    					example="19:30:00",
     *                  ),
     *    				 @OA\Property(property="jam_selesai",
     *    					type="time",
     *    					example="21:30:00",
     *    					description=""
     *    				),
     *    				 @OA\Property(property="md_kegiatan_id",
     *    					type="string",
     *    					example="P-U-DRH",
     *    					description=""
     *                  ),
     *    			),
     *    		),
     *    	),
     *   ),
     */
    public function update(Request $request, $id)
    {

        $data = $request->only([
            'tanggal',
            'jam_mulai',
            'jam_selesai',
            'md_kegiatan_id'
        ]);

        try {
            $this->jadwalService->updateData($data, $id);
        } catch (Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }

        return $this->success('Data berhasil diupdate!');
    }

    /**
     * Delete Trans Jadwal
     *
     * @OA\Delete(
     *     path="/api/trans/jadwal/{id}",
     *     tags={"trans/jadwal"},
     *     operationId="trans/jadwal/{id}/delete",
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
    public function delete($id) {
        $result = $this->jadwalService->deleteById($id);
        return $result ? $this->success('data berhasil dihapus') : $this->handleErrorRequest('data gagal dihapus');
    }
}
