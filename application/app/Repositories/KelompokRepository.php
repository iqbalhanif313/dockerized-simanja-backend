<?php

namespace App\Repositories;

use App\Models\Kelompok;
use DB;

class KelompokRepository
{
    /**
     * @var Kelompok
     */
    protected $kelompok;

    public function __construct(Kelompok $kelompok)
    {
        $this->kelompok = $kelompok;
    }

    public function getAll()
    {
        $query = "SELECT CONCAT(md_kelompok.id,'- ',md_kelompok.nama) as id_nama,md_kelompok.*,st_desa.nama as desa
        FROM md_kelompok
        LEFT JOIN st_desa ON md_kelompok.st_desa_id = st_desa.id";
        $data = DB::select($query);
        return $data;
    }

    public function getRef()
    {
        $response = [];
        $datas = Kelompok::all();
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
        $query = "SELECT CONCAT(md_kelompok.id,'- ',md_kelompok.nama) as id_nama, md_kelompok.*,st_desa.nama as desa
        FROM md_kelompok
        LEFT JOIN st_desa ON md_kelompok.st_desa_id = st_desa.id 
        WHERE md_kelompok.id = '$id'";
        $data = DB::select($query);
        return $data;
    }

    public function save($data)
    {
        $kelompok = new $this->kelompok;

        $kelompok->id = $data['id'];
        $kelompok->st_desa_id = $data['st_desa_id'];
        $kelompok->nama = $data['nama'];
        $kelompok->alamat = $data['alamat'];
        $kelompok->save();

        return $kelompok->fresh();
    }

    public function update($data, $id)
    {
        
        $kelompok = $this->kelompok->find($id);

        $kelompok->id = $data['id'];
        $kelompok->st_desa_id = $data['st_desa_id'];
        $kelompok->nama = $data['nama'];
        $kelompok->alamat = $data['alamat'];
        $kelompok->save();

        $kelompok->update();

        return $kelompok;
    }

    public function delete($id)
    {
        
        $kelompok = $this->kelompok->find($id);
        $kelompok->delete();

        return $kelompok;
    }

}