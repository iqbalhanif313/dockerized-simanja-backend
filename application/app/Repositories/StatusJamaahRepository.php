<?php

namespace App\Repositories;

use App\Models\StatusJamaah;
use DB;

class StatusJamaahRepository
{
    /**
     * @var StatusJamaah
     */
    protected $statusJamaah;

    public function __construct(StatusJamaah $statusJamaah)
    {
        $this->statusJamaah = $statusJamaah;
    }

    public function getAll()
    {
        $data = StatusJamaah::all();
        return $data;
    }

    public function getRef()
    {
        $response = [];
        $datas = StatusJamaah::all();
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
        return $this->statusJamaah
            ->where('id', $id)
            ->get();
    }

}