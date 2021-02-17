<?php

namespace App\Repositories;

use App\Models\Jadwal;
use InvalidArgumentException;
use Ramsey\Uuid\Uuid;
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
        return $this->jadwal->newQuery()
            ->selectRaw(
                "trans_jadwal.id,
                trans_jadwal.tanggal,
                TO_CHAR(trans_jadwal.tanggal, 'DD Mon YYYY') as ftanggal,
                trans_jadwal.jam_mulai,
                trans_jadwal.jam_selesai,
                mk.id as md_kegiatan_id,
                mk.deskripsi as kegiatan,
                case when mk.id is null then '-' else mk.id end as md_kegiatan_id,
                case when mk.deskripsi is null then '-' else mk.deskripsi end as kegiatan,
                case when sl.nama is null then '-' else sl.nama end as level,
                case when mkel.nama is null then '-' else mkel.nama end as kelompok,
                case when sd.nama is null then '-' else sd.nama end as desa,
                case when sjk.nama is null then '-' else sjk.nama end as jenis_kegiatan,
                case when skj.nama is null then '-' else skj.nama end as peserta"
            )
            ->leftJoin('md_kegiatan as mk', 'trans_jadwal.md_kegiatan_id', '=', 'mk.id')
            ->leftJoin('st_jenis_kegiatan as sjk', 'mk.st_jenis_kegiatan_id', '=', 'sjk.id')
            ->leftJoin('st_kategori_jamaah as skj', 'mk.st_kategori_jamaah_id', '=', 'skj.id')
            ->leftJoin('st_level as sl', 'mk.st_level_id', '=', 'sl.id')
            ->leftJoin('md_kelompok as mkel', 'mk.md_kelompok_id', '=', 'mkel.id')
            ->leftJoin('st_desa as sd', 'mk.st_desa_id', '=', 'sd.id')
            ->whereNull('trans_jadwal.deleted_at')
            ->get();
    }

    public function getById($id)
    {
        $query = "SELECT trans_jadwal.*,md_kegiatan.deskripsi as kegiatan,st_level.nama as level,md_kelompok.nama as kelompok,st_desa.nama as desa , st_jenis_kegiatan.nama as jenis_kegiatan,st_kategori_jamaah.nama as peserta
        FROM trans_jadwal
        LEFT JOIN md_kegiatan ON trans_jadwal.md_kegiatan_id = md_kegiatan.id
        LEFT JOIN st_jenis_kegiatan ON md_kegiatan.st_jenis_kegiatan_id = st_jenis_kegiatan.id
        LEFT JOIN st_kategori_jamaah ON md_kegiatan.st_kategori_jamaah_id = st_kategori_jamaah.id
        LEFT JOIN st_level ON md_kegiatan.st_level_id = st_level.id
        LEFT JOIN md_kelompok ON md_kegiatan.md_kelompok_id = md_kelompok.id
        LEFT JOIN st_desa ON md_kegiatan.st_desa_id = st_desa.id
        WHERE trans_jadwal.id = '$id'
        AND trans_jadwal.deleted_at IS NULL";

        $data = DB::select($query);
        return $data;
    }

    public function save($data)
    {
        $jadwal = new $this->jadwal;

        $jadwal->id = Uuid::uuid1()->toString();
        $jadwal->tanggal = $data['tanggal'];
        $jadwal->jam_mulai = $data['jam_mulai'];
        $jadwal->jam_selesai = $data['jam_selesai'];
        $jadwal->md_kegiatan_id = $data['md_kegiatan_id'];
        $jadwal->save();

        return $jadwal->fresh();
    }

    public function update($data, $id)
    {
        return $this->jadwal->newQuery()
            ->find($id)
            ->update($data);
    }

    public function delete($id)
    {
        return $this->jadwal->newQuery()
            ->find($id)
            ->delete();
    }

}
