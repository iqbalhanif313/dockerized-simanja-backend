<?php

namespace App\Services\Kabupaten;

use App\Models\Kabupaten;
use App\Repositories\KabupatenRepository;
use Illuminate\Support\Facades\DB;

class KabupatenService
{
    protected $repository;

    public function __construct(KabupatenRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll(){
        return $this->repository->getAll();
    }

    public function getByFilter($st_kabupaten_id){
        return $this->repository->getByFilter($st_kabupaten_id);
    }

    public function getRef($prov)
    {
        return $this->repository->getRef($prov);
    }

    public function getById($id)
    {
        return Kabupaten::find($id);
    }

    public function deleteById($id)
    {
        DB::transaction(function()use($id){
            $kabupaten = Kabupaten::find($id);
            $kabupaten->delete();
        });
    }

    public function updateData($data, $id)
    {
        DB::transaction(function()use($data,$id){
            $kabupaten = Kabupaten::find($id);
            if(!$kabupaten){
                return false;
            }
            $kabupaten->nama = $data['nama'];
            $kabupaten->st_provinsi_id = $data['st_provinsi_id'];
            $kabupaten->save();
        });
        return true;

    }

    public function saveData($data)
    {
        DB::transaction(function()use($data){
            $kabupaten = new Kabupaten();
            $kabupaten->id = $data['id'];
            $kabupaten->nama = $data['nama'];
            $kabupaten->st_provinsi_id = $data['st_provinsi_id'];
            $kabupaten->save();
        });
    }

}
