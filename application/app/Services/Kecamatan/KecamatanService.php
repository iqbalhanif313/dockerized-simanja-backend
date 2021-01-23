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
    protected $kecamatanRepository;

    public function __construct(KecamatanRepository $kecamatanRepository)
    {
        $this->kecamatanRepository = $kecamatanRepository;
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
        return $this->kecamatanRepository->getAll();
    }

    public function getRef()
    {
        return $this->kecamatanRepository->getRef();
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
            $kecamatan->save();
        });
    }

}
