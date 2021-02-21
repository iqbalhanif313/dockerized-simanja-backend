<?php

namespace App\Repositories;

use App\Models\Kelurahan;
use DB;

class KelurahanRepository
{
    /**
     * @var Kelurahan
     */
    protected $model;

    public function __construct(Kelurahan $model)
    {
        $this->model = $model;
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

    public function getRef($kec)
    {return $this->model->newQuery()
        ->selectRaw("id, concat(id, ' - ', nama) as text")
        ->where('st_kec_id', $kec)
        ->whereNull('deleted_at')
        ->get();
    }

    public function getById($id)
    {
        return $this->model
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
