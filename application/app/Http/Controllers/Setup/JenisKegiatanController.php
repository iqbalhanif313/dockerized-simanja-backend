<?php


namespace App\Http\Controllers\Setup;

use App\Http\Request\CreateJenisKegiatanRequest;
use App\Http\Request\UpdateDesaRequest;
use App\Http\Request\UpdateJenisKegiatanRequest;
use App\Services\JenisKegiatan\JenisKegiatanService;
use App\Http\Controllers\Controller;
use Exception;

class JenisKegiatanController extends Controller
{
    /**
     * @var JenisKegiatanService
     */
    private $jenisKegiatanService;

    public function __construct()
    {
        $this->jenisKegiatanService = new JenisKegiatanService();
    }


    /**
     * Show Setup Jenis Kegiatan information
     *
     * @OA\Get(
     *     path="/api/setup/jenis-kegiatan",
     *     tags={"setup/jenis-kegiatan"},
     *     operationId="setup/jenis-kegiatan",
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
        try{
            $data = $this->jenisKegiatanService->getAll();
            return $this->data($data);
        }catch (\Exception $e){
            return $this->handleErrorRequest($e->getMessage());
        }

    }

    public function show($id)
    {
        try {
            return $this->data($this->jenisKegiatanService->getById($id));
        } catch (Exception $e) {
            $this->handleErrorRequest($e);
        }
    }

    public function delete($id){
        try{
            $this->jenisKegiatanService->deleteById($id);
        }catch (\Exception $e){
            return $this->handleErrorRequest($e->getMessage());
        }
    }

    public function store(CreateJenisKegiatanRequest $request){
        $data = $request->only([
            'nama',
        ]);
        try {
            $this->jenisKegiatanService->saveData($data);
        } catch (\Exception $e) {
            return $this->handleErrorRequest($e->getMessage());
        }
        return $this->success("Jenis Kegiatan berhasil dibuat");
    }

    public function update(UpdateJenisKegiatanRequest $request, $id){
        $data = $request->only([
            'id',
            'nama'
        ]);

        try{
            if(!$this->jenisKegiatanService->updateData($data, $id)){
                return $this->handleBadRequest("Bad Request");
            }
        }catch (\Exception $e){
            return $this->handleErrorRequest($e->getMessage());
        }
    }

    /**
     * Show Ref Setup Jenis Kegiatan information
     *
     * @OA\Get(
     *     path="/api/ref/jenis-kegiatan",
     *     tags={"references"},
     *     operationId="ref/jenis-kegiatan",
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
            $result =  $this->jenisKegiatanService->getRef();
        } catch (Exception $e) {
            $this->handleErrorRequest($e->getMessage());
        }
        return $this->data($result);
    }  

}
