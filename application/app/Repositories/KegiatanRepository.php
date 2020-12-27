<?php

namespace App\Repositories;

use App\Models\Kegiatan;
use DB;

class KegiatanRepository
{
    /**
     * @var Kegiatan
     */
    protected $kegiatan;

    public function __construct(Kegiatan $kegiatan)
    {
        $this->kegiatan = $kegiatan;
    }

    public function getAll()
    {
        $query = "SELECT md_kegiatan.*,st_level.nama as level,md_kelompok.nama as kelompok,st_desa.nama as desa , st_jenis_kegiatan.nama as jenis_kegiatan,st_kategori_jamaah.nama as peserta
        FROM md_kegiatan
        LEFT JOIN st_jenis_kegiatan ON md_kegiatan.st_jenis_kegiatan_id = st_jenis_kegiatan.id
        LEFT JOIN st_kategori_jamaah ON md_kegiatan.st_kategori_jamaah_id = st_kategori_jamaah.id
        LEFT JOIN st_level ON md_kegiatan.st_level_id = st_level.id
        LEFT JOIN md_kelompok ON md_kegiatan.md_kelompok_id = md_kelompok.id 
        LEFT JOIN st_desa ON md_kegiatan.st_desa_id = st_desa.id  
        WHERE md_kegiatan.deleted_at IS NULL";
        $data = DB::select($query);
        return $data;
    }

    public function getById($id)
    {
        $query = "SELECT md_kegiatan.*,st_level.nama as level,md_kelompok.nama as kelompok,st_desa.nama as desa , st_jenis_kegiatan.nama as jenis_kegiatan,st_kategori_jamaah.nama as peserta
        FROM md_kegiatan
        LEFT JOIN st_jenis_kegiatan ON md_kegiatan.st_jenis_kegiatan_id = st_jenis_kegiatan.id
        LEFT JOIN st_kategori_jamaah ON md_kegiatan.st_kategori_jamaah_id = st_kategori_jamaah.id
        LEFT JOIN st_level ON md_kegiatan.st_level_id = st_level.id
        LEFT JOIN md_kelompok ON md_kegiatan.md_kelompok_id = md_kelompok.id 
        LEFT JOIN st_desa ON md_kegiatan.st_desa_id = st_desa.id  
        WHERE md_kegiatan.id = '$id' 
        AND md_kegiatan.deleted_at IS NULL";
        $data = DB::select($query);
        return $data;
    }

    public function save($data)
    {
        $kegiatan = new $this->kegiatan;

        $kegiatan->id = $data['id'];
        $kegiatan->deskripsi = $data['deskripsi'];
        $kegiatan->st_level_id = $data['st_level_id'];
        $kegiatan->st_jenis_kegiatan_id = $data['st_jenis_kegiatan_id'];
        $kegiatan->st_kategori_jamaah_id = $data['st_kategori_jamaah_id'];
        $kegiatan->st_desa_id = $data['st_desa_id'];
        $kegiatan->md_kelompok_id = $data['md_kelompok_id'];
        $kegiatan->save();

        return $kegiatan->fresh();
    }

    public function update($data, $id)
    {
        
        $kegiatan = $this->kegiatan->find($id);

        $kegiatan->id = $data['id'];
        $kegiatan->deskripsi = $data['deskripsi'];
        $kegiatan->st_level_id = $data['st_level_id'];
        $kegiatan->st_jenis_kegiatan_id = $data['st_jenis_kegiatan_id'];
        $kegiatan->st_kategori_jamaah_id = $data['st_kategori_jamaah_id'];
        $kegiatan->st_desa_id = $data['st_desa_id'];
        $kegiatan->md_kelompok_id = $data['md_kelompok_id'];

        $kegiatan->update();

        return $kegiatan;
    }

    public function delete($id)
    {
        
        $kegiatan = $this->kegiatan->find($id);
        $kegiatan->delete();

        return $kegiatan;
    }

}