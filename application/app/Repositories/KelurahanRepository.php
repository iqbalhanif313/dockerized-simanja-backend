<?php

namespace App\Repositories;

use App\Models\Kelurahan;
use DB;

class KelurahanRepository
{
    /**
     * @var Kelurahan
     */
    protected $kelurahan;

    public function __construct(Kelurahan $kelurahan)
    {
        $this->kelurahan = $kelurahan;
    }

    public function getAll()
    {
        $response = [];
        $datas = Kelurahan::all();
        foreach ($datas as $data){
            $response[] = [
                "id" => $data->id,
                "nama" => $data->nama,
                "kecamatan" => $data->kecamatan->nama,
            ];
        }
        return $response;
    }

    public function getById($id)
    {
        return $this->kelurahan
            ->where('id', $id)
            ->get();
    }

}