<?php

namespace App\Repositories;

use App\Models\StatusKehadiran;
use DB;

class StatusKehadiranRepository
{
    /**
     * @var StatusKehadiran
     */
    protected $statusKehadiran;

    public function __construct(StatusKehadiran $statusKehadiran)
    {
        $this->statusKehadiran = $statusKehadiran;
    }

    public function getAll()
    {
        $data = StatusKehadiran::all();
        return $data;
    }

    public function getRef()
    {
        $response = [];
        $datas = StatusKehadiran::all();
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