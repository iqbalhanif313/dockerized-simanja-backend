<?php


namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use DB;
use Exception;
use App\Services\Kelompok\KelompokService;

class KelompokController extends Controller
{

    protected $kelompokService;

    public function __construct(KelompokService $kelompokService)
    {
        $this->kelompokService = $kelompokService;
    }
    /**
     * Show Setup Kelompok information
     *
     * @OA\Get(
     *     path="/api/master/kelompok",
     *     tags={"master"},
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

    public function index()
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->kelompokService->getAll();
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
            'st_desa_id',
            'nama',
            'alamat'
        ]);

        $result = ['status' => 200];

        try {
            $result['data'] = $this->kelompokService->saveData($data);
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
            $result['data'] = $this->kelompokService->getById($id);
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
            'st_desa_id',
            'nama',
            'alamat'
        ]);

        $result = ['status' => 200];

        try {
            $result['data'] = $this->kelompokService->updateData($data, $id);

        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);

    }

}
