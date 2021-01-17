<?php

namespace App\Services\Provinsi;

use App\Models\Provinsi;
use App\Repositories\ProvinsiRepository;
use Illuminate\Support\Facades\DB;

class ProvinsiService
{
    protected $provinsiRepository;

    public function __construct(ProvinsiRepository $provinsiRepository)
    {
        $this->provinsiRepository = $provinsiRepository;
    }

    public function deleteById($id)
    {
        DB::transaction(function()use($id){
            $provinsi = Provinsi::find($id);
            $provinsi->delete();
        });
    }

    public function getAll()
    {
        return $this->provinsiRepository->getAll();
    }

    public function getById($id)
    {
        return Provinsi::find($id);
    }

    public function updateData($data, $id)
    {
        DB::transaction(function()use($data,$id){
            $provinsi = Provinsi::find($id);
            if(!$provinsi){
                return false;
            }
            $provinsi->nama = $data['nama'];
            $provinsi->save();
        });
        return true;

    }

    public function saveData($data)
    {
        DB::transaction(function()use($data){
            $provinsi = new Provinsi();
            $provinsi->id = $data['id'];
            $provinsi->nama = $data['nama'];
            $provinsi->save();
        });
    }

}
