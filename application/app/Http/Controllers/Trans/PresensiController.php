<?php


namespace App\Http\Controllers\Trans;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use DB;
use Exception;
use App\Services\Presensi\PresensiService;

class PresensiController extends Controller
{

    protected $presensiService;

    public function __construct(PresensiService $presensiService)
    {
        $this->presensiService = $presensiService;
    }
    /**
     * Show Setup Presensi information
     *
     * @OA\Get(
     *     path="/api/master/presensi",
     *     tags={"master"},
     *     operationId="master/presensi",
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
            $result['data'] = $this->presensiService->getAll();
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
            'tanggal',
            'jam_mulai',
            'jam_selesai',
            'md_kegiatan_id'
        ]);

        $result = ['status' => 200];

        try {
            $result['data'] = $this->presensiService->saveData($data);
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
            $result['data'] = $this->presensiService->getById($id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }

    public function getByTransJadwalId($trans_jadwal_id)
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->presensiService->getByTransJadwalId($trans_jadwal_id);
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
            'tanggal',
            'jam_mulai',
            'jam_selesai',
            'md_kegiatan_id'
        ]);

        $result = ['status' => 200];

        try {
            $result['data'] = $this->presensiService->updateData($data, $id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }
}
