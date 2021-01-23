<?php

namespace App\Repositories;

use App\Models\Kabupaten;

class KabupatenRepository
{
    /**
     * @var Kabupaten
     */
    protected $kabupaten;

    public function __construct(Kabupaten $kabupaten)
    {
        $this->kabupaten = $kabupaten;
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

    public function getRef()
    {
        $response = [];
        $datas = Kabupaten::all();
        foreach ($datas as $data) {
            $response[] = [
                "id" => $data->id,
                "nama" => $data->nama,
                "id_nama" => $data->id . ' - ' . $data->nama
            ];
        }
        return $response;
    }

    public function getById($id)
    {
        return $this->kabupaten->where('id', $id)->get();
    }

    public function getByFilter($st_provinsi_id)
    {
        $response = [];
        $datas = Kabupaten::where('st_provinsi_id', $st_provinsi_id)->get();;
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
