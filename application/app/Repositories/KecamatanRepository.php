<?php

namespace App\Repositories;

use App\Models\Kecamatan;
use DB;

class KecamatanRepository
{
    /**
     * @var Kecamatan
     */
    protected $model;

    public function __construct(Kecamatan $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        $response = [];
        $datas = Kecamatan::all();
        foreach ($datas as $data){
            $response[] = [
                "id" => $data->id,
                "nama" => $data->nama,
                "kabupaten"=>$data->kabupaten->nama,
            ];
        }
        return $response;
    }

    public function getRef($kab)
    {
        return $this->model->newQuery()
            ->selectRaw("id, concat(id, ' - ', nama) as text")
            ->where('st_kab_id', $kab)
            ->whereNull('deleted_at')
            ->get();
    }

    public function getById($id)
    {
        return $this->model
            ->where('id', $id)
            ->get();
    }

    public function getByFilter($st_kab_id)
    {
        $response = [];
        $datas = Kecamatan::where('st_kab_id', $st_kab_id)->get();;
        foreach ($datas as $data) {
            $response[] = [
                "id" => $data->id,
                "nama" => $data->nama,
                "text" => $data->id . ' - ' . $data->nama
            ];
        }
        return $response;
    }

}
