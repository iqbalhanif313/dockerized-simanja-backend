<?php

namespace App\Services\KategoriJamaah;

use App\Models\KategoriJamaah;
use App\Repositories\KategoriJamaahRepository;
use Illuminate\Support\Facades\DB;

class KategoriJamaahService
{
    protected $kategoriJamaahRepository;

    public function __construct(KategoriJamaahRepository $kategoriJamaahRepository)
    {
        $this->kategoriJamaahRepository = $kategoriJamaahRepository;
    }

    public function deleteById($id)
    {
        DB::transaction(function()use($id){
            $kategoriJamaah = KategoriJamaah::find($id);
            $kategoriJamaah->delete();
        });
    }

    public function getAll()
    {
        return $this->kategoriJamaahRepository->getAll();
    }

    public function getRef()
    {
        return $this->kategoriJamaahRepository->getRef();
    }

    public function getById($id)
    {
        return KategoriJamaah::find($id);
    }

    public function updateData($data, $id)
    {
        DB::transaction(function()use($data,$id){
            $kategoriJamaah = KategoriJamaah::find($id);
            if(!$kategoriJamaah){
                return false;
            }
            $kategoriJamaah->nama = $data['nama'];
            $kategoriJamaah->save();
        });
        return true;

    }

    public function saveData($data)
    {
        DB::transaction(function()use($data){
            $kategoriJamaah = new KategoriJamaah();
            $kategoriJamaah->id = $data['id'];
            $kategoriJamaah->nama = $data['nama'];
            $kategoriJamaah->save();
        });
    }

}
