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
     * Show Setup Kepengurusan information
     *
     * @OA\Get(
     *     path="/api/master/kepengurusan",
     *     tags={"master"},
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
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

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
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    public function show($id)
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->kepengurusanService->getById($id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }

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
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);

    }

}
