<?php

namespace App\Services\Kecamatan;

use App\Models\Kecamatan;
use App\Repositories\KecamatanRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class KecamatanService
{
    protected $repository;

    public function __construct(KecamatanRepository $repository)
    {
        $this->repository = $repository;
    }

    public function deleteById($id)
    {
        DB::transaction(function()use($id){
            $kecamatan = Kecamatan::find($id);
            $kecamatan->delete();
        });
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function getByFilter($st_kab_id){
        return $this->repository->getByFilter($st_kab_id);
    }

    public function getRef($kab)
    {
        return $this->repository->getRef($kab);
    }

    public function getById($id)
    {
        return Kecamatan::find($id);
    }

    public function updateData($data, $id)
    {
        DB::transaction(function()use($data,$id){
            $kecamatan = Kecamatan::find($id);
            if(!$kecamatan){
                return false;
            }
            $kecamatan->nama = $data['nama'];
            $kecamatan->st_kab_id = $data['st_kab_id'];
            $kecamatan->save();
        });
        return true;

    }

    public function saveData($data)
    {
        DB::transaction(function()use($data){
            $kecamatan = new Kecamatan();
            $kecamatan->id = $data['id'];
            $kecamatan->nama = $data['nama'];
            $kecamatan->st_kab_id = $data['st_kab_id'];
            $kecamatan->save();
        });
    }

}
