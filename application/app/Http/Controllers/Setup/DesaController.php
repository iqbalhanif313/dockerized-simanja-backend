<?php


namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use DB;
use Exception;
use App\Services\Desa\DesaService;

class DesaController extends Controller
{

    protected $desaService;

    public function __construct(DesaService $desaService)
    {
        $this->desaService = $desaService;
    }
    /**
     * Show Setup Desa information
     *
     * @OA\Get(
     *     path="/api/setup/desa",
     *     tags={"setup"},
     *     operationId="setup/desa",
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
            $result['message'] = "ok";
            $result['data'] = $this->desaService->getAll();
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
        ]);

        $result = ['status' => 200];

        try {
            $result['data'] = $this->desaService->saveData($data);
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
            $result['data'] = $this->desaService->getById($id);
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
            'nama'
        ]);

        $result = ['status' => 200];

        try {
            $result['data'] = $this->desaService->updateData($data, $id);

        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);

    }

}
