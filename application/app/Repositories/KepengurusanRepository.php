<?php

namespace App\Repositories;

use App\Models\Kepengurusan;
use DB;

class KepengurusanRepository
{
    /**
     * @var Kepengurusan
     */
    protected $kepengurusan;

    public function __construct(Kepengurusan $kepengurusan)
    {
        $this->kepengurusan = $kepengurusan;
    }

    public function getAll()
    {
        $query = "SELECT CONCAT(md_kepengurusan.id,' - ',md_kepengurusan.nama) as id_nama,md_kepengurusan.*,st_kepengurusan.nama as kategori,st_level.nama as level
        FROM md_kepengurusan
        LEFT JOIN st_kepengurusan ON md_kepengurusan.st_kepengurusan_id = st_kepengurusan.id
        LEFT JOIN st_level ON md_kepengurusan.st_level_id = st_level.id";
        $data = DB::select($query);
        return $data;
    }

    public function getById($id)
    {
        $query = "SELECT CONCAT(md_kepengurusan.id,' - ',md_kepengurusan.nama) as id_nama,md_kepengurusan.*,st_kepengurusan.nama as kategori,st_level.nama as level
        FROM md_kepengurusan
        LEFT JOIN st_kepengurusan ON md_kepengurusan.st_kepengurusan_id = st_kepengurusan.id
        LEFT JOIN st_level ON md_kepengurusan.st_level_id = st_level.id
        WHERE md_kepengurusan.id = '$id'";
        $data = DB::select($query);
        return $data;
    }

    public function save($data)
    {
        $kepengurusan = new $this->kepengurusan;

        $kepengurusan->id = $data['id'];
        $kepengurusan->st_level_id = $data['st_level_id'];
        $kepengurusan->nama = $data['nama'];
        $kepengurusan->st_kepengurusan_id = $data['st_kepengurusan_id'];
        $kepengurusan->save();

        return $kepengurusan->fresh();
    }

    public function update($data, $id)
    {
        
        $kepengurusan = $this->kepengurusan->find($id);

        $kepengurusan->id = $data['id'];
        $kepengurusan->st_level_id = $data['st_level_id'];
        $kepengurusan->nama = $data['nama'];
        $kepengurusan->st_kepengurusan_id = $data['st_kepengurusan_id'];
        $kepengurusan->save();

        $kepengurusan->update();

        return $kepengurusan;
    }

    public function delete($id)
    {
        
        $kepengurusan = $this->kepengurusan->find($id);
        $kepengurusan->delete();

        return $kepengurusan;
    }

}