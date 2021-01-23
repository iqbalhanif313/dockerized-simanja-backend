<?php

namespace App\Repositories;

use App\Models\TipeMutasi;
use DB;

class TipeMutasiRepository
{
    /**
     * @var TipeMutasi
     */
    protected $statusKehadiran;

    public function __construct(TipeMutasi $statusKehadiran)
    {
        $this->statusKehadiran = $statusKehadiran;
    }

    public function getAll()
    {
        $data = TipeMutasi::all();
        return $data;
    }

    public function getRef()
    {
        $response = [];
        $datas = TipeMutasi::all();
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
        return $this->statusKehadiran
            ->where('id', $id)
            ->get();
    }

}