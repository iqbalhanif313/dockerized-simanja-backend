<?php


namespace App\Http\Controllers\Trans;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use DB;
use Exception;
use App\Services\TransKepengurusan\TransKepengurusanService;

class KepengurusanController extends Controller
{

    protected $kepengurusanService;

    public function __construct(TransKepengurusanService $transKepengurusanService)
    {
        $this->transKepengurusanService = $transKepengurusanService;
    }
    /**
     * Show List Trans Kepengurusan
     *
     * @OA\Get(
     *     path="/api/trans/kepengurusan",
     *     tags={"trans/kepengurusan"},
     *     operationId="trans/kepengurusan",
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
            $result['data'] = $this->transKepengurusanService->getAll();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    /**
     * Store Trans Kepengurusan
     *
     * @OA\Post(
     *     path="/api/trans/kepengurusan",
     *     tags={"trans/kepengurusan"},
     *     operationId="trans/kepengurusan/store",
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
     *                  @OA\Property(property="md_jamaah_nik",
     *    					type="string",
     *    					example="",
     *                  ),
     *                  @OA\Property(property="md_kepengurusan_id",
     *    					type="string",
     *    					example="",
     *                  ),
     *    			),
     *    		),
     *    	),
     *   ),
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'md_jamaah_nik',
            'md_kepengurusan_id'
        ]);

        $result = ['status' => 200];

        try {
            $result['data'] = $this->transKepengurusanService->saveData($data);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    /**
     * Show Detail Trans Kepengurusan
     *
     * @OA\Get(
     *     path="/api/trans/kepengurusan/{id}",
     *     tags={"trans/kepengurusan"},
     *     operationId="trans/kepengurusan/id",
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
            $result['data'] = $this->transKepengurusanService->getById($id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }

    /**
     * Update Trans Kepengurusan
     *
     * @OA\Put(
     *     path="/api/trans/kepengurusan/{id}",
     *     tags={"trans/kepengurusan"},
     *     operationId="trans/kepengurusan/update",
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
     *                  @OA\Property(property="md_jamaah_nik",
     *    					type="string",
     *    					example="",
     *                  ),
     *                  @OA\Property(property="md_kepengurusan_id",
     *    					type="string",
     *    					example="",
     *                  ),
     *    			),
     *    		),
     *    	),
     *   ),
     */
    public function update(Request $request, $id)
    {
        $data = $request->only([
            'md_jamaah_nik',
            'md_kepengurusan_id'
        ]);

        $result = ['status' => 200];

        try {
            $result['data'] = $this->transKepengurusanService->updateData($data, $id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }
}
