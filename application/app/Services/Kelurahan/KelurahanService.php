<?php

namespace App\Services\Kelurahan;

use App\Models\Kelurahan;
use App\Repositories\KelurahanRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class KelurahanService
{
    protected $repository;

    public function __construct(KelurahanRepository $repository)
    {
        $this->repository = $repository;
    }

    public function deleteById($id)
    {
        DB::transaction(function()use($id){
            $kelurahan = Kelurahan::find($id);
            $kelurahan->delete();
        });
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function getRef($kec)
    {
        return $this->repository->getRef($kec);
    }

    public function getById($id)
    {
        return Kelurahan::find($id);
    }

    public function getByFilter($st_kec_id){
        return $this->repository->getByFilter($st_kec_id);
    }

    public function updateData($data, $id)
    {
        DB::transaction(function()use($data,$id){
            $kelurahan = Kelurahan::find($id);
            if(!$kelurahan){
                return false;
            }
            $kelurahan->nama = $data['nama'];
            $kelurahan->save();
        });
        return true;

    }

    public function saveData($data)
    {
        DB::transaction(function()use($data){
            $kelurahan = new Kelurahan();
            $kelurahan->id = $data['id'];
            $kelurahan->nama = $data['nama'];
            $kelurahan->st_kec_id = $data['st_kec_id'];
            $kelurahan->save();
        });
    }

}
