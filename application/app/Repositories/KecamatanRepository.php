<?php

namespace App\Repositories;

use App\Models\Kecamatan;
use DB;

class KecamatanRepository
{
    /**
     * @var Kecamatan
     */
    protected $kecamatan;

    public function __construct(Kecamatan $kecamatan)
    {
        $this->kecamatan = $kecamatan;
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

    public function getRef()
    {
        $response = [];
        $datas = Kecamatan::all();
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
        return $this->kecamatan
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
                "id_nama" => $data->id . ' - ' . $data->nama
            ];
        }
        return $response;
    }

}