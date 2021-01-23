<?php

namespace App\Services\Kabupaten;

use App\Models\Kabupaten;
use App\Repositories\KabupatenRepository;
use Illuminate\Support\Facades\DB;

class KabupatenService
{
    protected $kabupatenRepository;

    public function __construct(KabupatenRepository $kabupatenRepository)
    {
        $this->kabupatenRepository = $kabupatenRepository;
    }

    public function getAll(){
        return $this->kabupatenRepository->getAll();
    }

    public function getByFilter($st_kabupaten_id){
        return $this->kabupatenRepository->getByFilter($st_kabupaten_id);
    }

    public function getRef()
    {
        return $this->kabupatenRepository->getRef();
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
