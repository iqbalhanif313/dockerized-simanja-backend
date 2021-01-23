<?php

namespace App\Repositories;

use App\Models\JenisKegiatan;

class JenisKegiatanRepository
{
    /**
     * @var JenisKegiatan
     */
    protected $jenisKegiatan;

    public function __construct(JenisKegiatan $jenisKegiatan)
    {
        $this->jenisKegiatan = $jenisKegiatan;
    }

    public function getAll()
    {
        $response = [];
        $datas = JenisKegiatan::all();
        foreach ($datas as $data){
            $response[] = [
                "id" => $data->id,
                "nama" => $data->nama,
                "provinsi"=>$data->provinsi->nama,
            ];
        }
        return $response;
    }

    public function getRef()
    {
        $response = [];
        $datas = JenisKegiatan::all();
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
        return $this->jenisKegiatan
            ->where('id', $id)
            ->get();
    }

}