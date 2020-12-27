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
     * Show Setup TransKepengurusan information
     *
     * @OA\Get(
     *     path="/api/trans/kepengurusan",
     *     tags={"trans"},
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
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

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
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    public function show($id)
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->transKepengurusanService->getById($id);
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
            'md_jamaah_nik',
            'md_kepengurusan_id'
        ]);

        $result = ['status' => 200];

        try {
            $result['data'] = $this->transKepengurusanService->updateData($data, $id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }
}
