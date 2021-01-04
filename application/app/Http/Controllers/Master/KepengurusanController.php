<?php


namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use DB;
use Exception;
use App\Services\Kepengurusan\KepengurusanService;

class KepengurusanController extends Controller
{

    protected $kepengurusanService;

    public function __construct(KepengurusanService $kepengurusanService)
    {
        $this->kepengurusanService = $kepengurusanService;
    }
    /**
     * Show List Master Kepengurusan
     *
     * @OA\Get(
     *     path="/api/master/kepengurusan",
     *     tags={"master/kepengurusan"},
     *     operationId="master/kepengurusan",
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
            $result['data'] = $this->kepengurusanService->getAll();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    /**
     * Store Master Kepengurusan
     *
     * @OA\Post(
     *     path="/api/master/kepengurusan",
     *     tags={"master/kepengurusan"},
     *     operationId="master/kepengurusan/store",
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
     *    					example="KUDRH",
     *                  ),
     *                  @OA\Property(property="nama",
     *    					type="string",
     *    					example="KU Daerah",
     *                  ),
     *    				 @OA\Property(property="st_kepengurusan_id",
     *    					type="string",
     *    					example="4S",
     *    					description=""
     *    				),
     *    				 @OA\Property(property="st_level_id",
     *    					type="string",
     *    					example="DRH",
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
            'id',
            'nama',
            'st_kepengurusan_id',
            'st_level_id'
        ]);

        $result = ['status' => 200];

        try {
            $result['data'] = $this->kepengurusanService->saveData($data);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    /**
     * Show Detail Master Kepengurusan
     *
     * @OA\Get(
     *     path="/api/master/kepengurusan/{id}",
     *     tags={"master/kepengurusan"},
     *     operationId="master/kepengurusan/id",
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
            $result['data'] = $this->kepengurusanService->getById($id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }

    /**
     * Update Master Kepengurusan
     *
     * @OA\Put(
     *     path="/api/master/kepengurusan",
     *     tags={"master/kepengurusan"},
     *     operationId="master/kepengurusan/update",
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
     *    					example="KUDRH",
     *                  ),
     *                  @OA\Property(property="nama",
     *    					type="string",
     *    					example="KU Daerah",
     *                  ),
     *    				 @OA\Property(property="st_kepengurusan_id",
     *    					type="string",
     *    					example="4S",
     *    					description=""
     *    				),
     *    				 @OA\Property(property="st_level_id",
     *    					type="string",
     *    					example="DRH",
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
            'id',
            'nama',
            'st_kepengurusan_id',
            'st_level_id'
        ]);

        $result = ['status' => 200];

        try {
            $result['data'] = $this->kepengurusanService->updateData($data, $id);

        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);

    }

}
