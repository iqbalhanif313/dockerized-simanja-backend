<?php

namespace App\Services\TipeMutasi;

use App\Models\TipeMutasi;
use App\Repositories\TipeMutasiRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class TipeMutasiService
{
    protected $tipeMutasiRepository;

    public function __construct(TipeMutasiRepository $tipeMutasiRepository)
    {
        $this->tipeMutasiRepository = $tipeMutasiRepository;
    }

    public function deleteById($id)
    {
        DB::transaction(function()use($id){
            $tipeMutasi = TipeMutasi::find($id);
            $tipeMutasi->delete();
        });
    }

    public function getAll()
    {
        return $this->tipeMutasiRepository->getAll();
    }

    public function getRef()
    {
        return $this->tipeMutasiRepository->getRef();
    }

    public function getById($id)
    {
        return TipeMutasi::find($id);
    }

    public function updateData($data, $id)
    {
        DB::transaction(function()use($data,$id){
            $tipeMutasi = TipeMutasi::find($id);
            if(!$tipeMutasi){
                return false;
            }
            $tipeMutasi->nama = $data['nama'];
            $tipeMutasi->save();
        });
        return true;

    }

    public function saveData($data)
    {
        DB::transaction(function()use($data){
            $tipeMutasi = new TipeMutasi();
            $tipeMutasi->id = $data['id'];
            $tipeMutasi->nama = $data['nama'];
            $tipeMutasi->save();
        });
    }

}
