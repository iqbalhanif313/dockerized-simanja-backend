<?php

namespace App\Repositories;

use App\Models\KategoriJamaah;
use DB;

class KategoriJamaahRepository
{
    /**
     * @var KategoriJamaah
     */
    protected $kategoriJamaah;

    public function __construct(KategoriJamaah $kategoriJamaah)
    {
        $this->kategoriJamaah = $kategoriJamaah;
    }

    public function getAll()
    {
        $data = KategoriJamaah::all();
        return $data;
    }

    public function getRef()
    {
        $response = [];
        $datas = KategoriJamaah::all();
        foreach ($datas as $data){
            $response[] = [
                "id" => $data->id,
                "nama" => $data->nama,
                "id_nama" => $data->id.' - '.$data->nama
            ];
        }
        return $response;
    }

    public function getById($id)
    {
        return $this->kategoriJamaah
            ->where('id', $id)
            ->get();
    }

}