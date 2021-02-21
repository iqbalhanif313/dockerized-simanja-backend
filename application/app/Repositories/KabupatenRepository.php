<?php

namespace App\Repositories;

use App\Models\Kabupaten;

class KabupatenRepository
{
    /**
     * @var Kabupaten
     */
    protected $model;

    public function __construct(Kabupaten $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        $response = [];
        $datas = Kabupaten::all();
        foreach ($datas as $data) {
            $response[] = [
                "id" => $data->id,
                "nama" => $data->nama,
                "provinsi" => $data->provinsi->nama,
            ];
        }
        return $response;
    }

    public function getRef($prov)
    {
        return $this->model->newQuery()
            ->selectRaw("id, concat(id, ' - ', nama) as text")
            ->where('st_provinsi_id', $prov)
            ->whereNull('deleted_at')
            ->get();
    }

    public function getById($id)
    {
        return $this->model->where('id', $id)->get();
    }

    public function getByFilter($st_provinsi_id)
    {
        $response = [];
        $datas = Kabupaten::where('st_provinsi_id', $st_provinsi_id)->get();;
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
