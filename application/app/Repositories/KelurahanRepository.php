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

    public function getRef()
    {
        $response = [];
        $datas = Kelurahan::all();
        foreach ($datas as $data){
            $response[] = [
                "id" => $data->id,
                "nama" => $data->nama,
                "text" => $data->id.' - '.$data->nama
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

    public function getByFilter($st_kec_id)
    {
        $response = [];
        $datas = Kelurahan::where('st_kec_id', $st_kec_id)->get();;
        foreach ($datas as $data) {
            $response[] = [
                "id" => $data->id,
                "nama" => $data->nama,
                "id_nama" => $data->id . ' - ' . $data->nama
            ];
        }
        return $response;
    }

}