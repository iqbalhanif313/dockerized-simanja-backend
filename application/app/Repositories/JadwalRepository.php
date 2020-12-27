<?php

namespace App\Repositories;

use App\Models\Jadwal;
use DB;

class JadwalRepository
{
    /**
     * @var Jadwal
     */
    protected $jadwal;

    public function __construct(Jadwal $jadwal)
    {
        $this->jadwal = $jadwal;
    }

    public function getAll()
    {
        $query = "SELECT trans_jadwal.*,md_kegiatan.deskripsi as kegiatan,st_level.nama as level,md_kelompok.nama as kelompok,st_desa.nama as desa , st_jenis_kegiatan.nama as jenis_kegiatan,st_kategori_jamaah.nama as peserta
        FROM trans_jadwal
        LEFT JOIN md_kegiatan ON trans_jadwal.md_kegiatan_id = md_kegiatan.id
        LEFT JOIN st_jenis_kegiatan ON md_kegiatan.st_jenis_kegiatan_id = st_jenis_kegiatan.id
        LEFT JOIN st_kategori_jamaah ON md_kegiatan.st_kategori_jamaah_id = st_kategori_jamaah.id
        LEFT JOIN st_level ON md_kegiatan.st_level_id = st_level.id
        LEFT JOIN md_kelompok ON md_kegiatan.md_kelompok_id = md_kelompok.id 
        LEFT JOIN st_desa ON md_kegiatan.st_desa_id = st_desa.id 
        WHERE trans_jadwal.deleted_at IS NULL";
        $data = DB::select($query);
        return $data;
    }

    public function getById($id)
    {
        $query = "SELECT md_jadwal.*,st_level.nama as level,md_kelompok.nama as kelompok,st_desa.nama as desa , st_jenis_jadwal.nama as jenis_jadwal,st_kategori_jamaah.nama as peserta
        FROM md_jadwal
        LEFT JOIN st_jenis_jadwal ON md_jadwal.st_jenis_jadwal_id = st_jenis_jadwal.id
        LEFT JOIN st_kategori_jamaah ON md_jadwal.st_kategori_jamaah_id = st_kategori_jamaah.id
        LEFT JOIN st_level ON md_jadwal.st_level_id = st_level.id
        LEFT JOIN md_kelompok ON md_jadwal.md_kelompok_id = md_kelompok.id 
        LEFT JOIN st_desa ON md_jadwal.st_desa_id = st_desa.id  
        WHERE md_jadwal.id = '$id' 
        AND md_jadwal.deleted_at IS NULL";
        $data = DB::select($query);
        return $data;
    }

    public function save($data)
    {
        $jadwal = new $this->jadwal;

        $jadwal->id = $data['id'];
        $jadwal->deskripsi = $data['deskripsi'];
        $jadwal->st_level_id = $data['st_level_id'];
        $jadwal->st_jenis_jadwal_id = $data['st_jenis_jadwal_id'];
        $jadwal->st_kategori_jamaah_id = $data['st_kategori_jamaah_id'];
        $jadwal->st_desa_id = $data['st_desa_id'];
        $jadwal->md_kelompok_id = $data['md_kelompok_id'];
        $jadwal->save();

        return $jadwal->fresh();
    }

    public function update($data, $id)
    {
        
        $jadwal = $this->jadwal->find($id);

        $jadwal->id = $data['id'];
        $jadwal->deskripsi = $data['deskripsi'];
        $jadwal->st_level_id = $data['st_level_id'];
        $jadwal->st_jenis_jadwal_id = $data['st_jenis_jadwal_id'];
        $jadwal->st_kategori_jamaah_id = $data['st_kategori_jamaah_id'];
        $jadwal->st_desa_id = $data['st_desa_id'];
        $jadwal->md_kelompok_id = $data['md_kelompok_id'];

        $jadwal->update();

        return $jadwal;
    }

    public function delete($id)
    {
        
        $jadwal = $this->jadwal->find($id);
        $jadwal->delete();

        return $jadwal;
    }

}