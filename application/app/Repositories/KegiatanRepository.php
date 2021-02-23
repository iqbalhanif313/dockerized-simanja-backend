<?php

namespace App\Repositories;

use App\Models\Kegiatan;
use Ramsey\Uuid\Uuid;

class KegiatanRepository
{
    /**
     * @var Kegiatan
     */
    protected $model;

    public function __construct(Kegiatan $model)
    {
        $this->model = $model;
    }

    public function data()
    {
        return $this->model->newQuery()
            ->selectRaw("
                md_kegiatan.id,
                md_kegiatan.deskripsi,
                md_kegiatan.md_kelompok_id,
                case when mk.nama is null then '-' else mk.nama end as kelompok,
                md_kegiatan.st_level_id,
                case when sl.nama is null then '-' else sl.nama end as level,
                md_kegiatan.st_jenis_kegiatan_id,
                case when sjk.nama is null then '-' else sjk.nama end as jenis_kegiatan,
                md_kegiatan.st_kategori_jamaah_id,
                case when skj.nama is null then '-' else skj.nama end as peserta,
                md_kegiatan.st_desa_id,
                case when sd.nama is null then '-' else sd.nama end as desa
            ")
            ->leftJoin('md_kelompok as mk', 'md_kegiatan.md_kelompok_id', '=', 'mk.id')
            ->leftJoin('st_jenis_kegiatan as sjk', 'md_kegiatan.st_jenis_kegiatan_id', '=', 'sjk.id')
            ->leftJoin('st_kategori_jamaah as skj', 'md_kegiatan.st_kategori_jamaah_id', '=', 'skj.id')
            ->leftJoin('st_level as sl', 'md_kegiatan.st_level_id', '=', 'sl.id')
            ->leftJoin('st_desa as sd', 'md_kegiatan.st_desa_id', '=', 'sd.id')
            ->whereNull('md_kegiatan.deleted_at')
            ->get();
    }

    public function list() {
        return $this->model->newQuery()
            ->selectRaw("id, deskripsi as text")
            ->whereNull('deleted_at')
            ->get();
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

    public function create($data)
    {
        $data['id'] = Uuid::uuid1()->toString();
        return $this->model->newQuery()
            ->create($data);
    }

    public function update($data, $id)
    {
        return $this->model->newQuery()
            ->find($id)
            ->update($data);
    }

    public function delete($id)
    {
        return $this->model->newQuery()
            ->find($id)
            ->delete();
    }

}
