<?php

namespace App\Repositories;

use App\Models\Provinsi;
use DB;

class ProvinsiRepository
{
    /**
     * @var Provinsi
     */
    protected $provinsi;

    public function __construct(Provinsi $provinsi)
    {
        $this->provinsi = $provinsi;
    }

    public function getAll()
    {
        $data = Provinsi::all();
        return $data;
    }

    public function getRef()
    {
        $response = [];
        $datas = Provinsi::all();
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
        return $this->provinsi
            ->where('id', $id)
            ->get();
    }

}