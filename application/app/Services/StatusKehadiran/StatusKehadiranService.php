<?php

namespace App\Services\StatusKehadiran;

use App\Models\StatusKehadiran;
use App\Repositories\StatusKehadiranRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class StatusKehadiranService
{
    protected $statusKehadiranRepository;

    public function __construct(StatusKehadiranRepository $statusKehadiranRepository)
    {
        $this->statusKehadiranRepository = $statusKehadiranRepository;
    }

    public function deleteById($id)
    {
        DB::transaction(function()use($id){
            $statusKehadiran = StatusKehadiran::find($id);
            $statusKehadiran->delete();
        });
    }

    public function getAll()
    {
        return $this->statusKehadiranRepository->getAll();
    }

    public function getRef()
    {
        return $this->statusKehadiranRepository->getRef();
    }

    public function getById($id)
    {
        return StatusKehadiran::find($id);
    }

    public function updateData($data, $id)
    {
        DB::transaction(function()use($data,$id){
            $statusKehadiran = StatusKehadiran::find($id);
            if(!$statusKehadiran){
                return false;
            }
            $statusKehadiran->nama = $data['nama'];
            $statusKehadiran->save();
        });
        return true;

    }

    public function saveData($data)
    {
        DB::transaction(function()use($data){
            $statusKehadiran = new StatusKehadiran();
            $statusKehadiran->id = $data['id'];
            $statusKehadiran->nama = $data['nama'];
            $statusKehadiran->save();
        });
    }

}
