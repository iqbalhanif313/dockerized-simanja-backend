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
    protected $kelurahanRepository;

    public function __construct(KelurahanRepository $kelurahanRepository)
    {
        $this->kelurahanRepository = $kelurahanRepository;
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
        return $this->kelurahanRepository->getAll();
    }

    public function getById($id)
    {
        return Kelurahan::find($id);
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
            $kelurahan->save();
        });
    }

}
