<?php

namespace App\Repositories\Master;

use App\Models\Master\Kegiatan;
use App\Repositories\BaseRepository;
use Ramsey\Uuid\Uuid;

class KegiatanRepository extends BaseRepository
{
    public function __construct(Kegiatan $model)
    {
        parent::__construct($model);
    }

    public function data($columns = '*')
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
}
