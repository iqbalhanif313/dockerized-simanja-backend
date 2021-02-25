<?php

namespace App\Repositories\Master;

use App\Models\Master\Jamaah;
use App\Repositories\BaseRepository;

class JamaahRepository extends BaseRepository
{
    public function __construct(Jamaah $model)
    {
        parent::__construct($model);
    }

    public function data($columns = '*')
    {
        return $this->model->newQuery()
            ->selectRaw("
                md_jamaah.nik,
                md_jamaah.nama,
                md_jamaah.jenis_kelamin,
                md_jamaah.tempat_lahir,
                md_jamaah.tanggal_lahir,
                to_char(md_jamaah.tanggal_lahir, 'DD Mon YYYY') as f_tanggal_lahir,
                md_jamaah.hp,
                md_jamaah.users_id,
                case when u.email is null then '-' else u.email end as email,
                md_jamaah.alamat,
                md_jamaah.st_kel_id,
                case when sl.nama is null then '-' else sl.nama end as kelurahan,
                md_jamaah.st_kec_id,
                case when sc.nama is null then '-' else sc.nama end as kecamatan,
                md_jamaah.st_kab_id,
                case when sb.nama is null then '-' else sb.nama end as kabupaten,
                md_jamaah.st_provinsi_id,
                case when sp.nama is null then '-' else sp.nama end as provinsi,
                md_jamaah.md_kelompok_id,
                case when mk.nama is null then '-' else mk.nama end as kelompok,
                md_jamaah.st_kategori_jamaah_id,
                case when skj.nama is null then '-' else skj.nama end as kategori,
                md_jamaah.st_status_jamaah_id,
                case when ssj.nama is null then '-' else ssj.nama end as status
            ")
            ->leftJoin('user as u', 'md_jamaah.users_id', '=', 'u.id')
            ->leftJoin('st_kel as sl', 'md_jamaah.st_kel_id', '=', 'sl.id')
            ->leftJoin('st_kec as sc', 'md_jamaah.st_kec_id', '=', 'sc.id')
            ->leftJoin('st_kab as sb', 'md_jamaah.st_kab_id', '=', 'sb.id')
            ->leftJoin('st_provinsi as sp', 'md_jamaah.st_provinsi_id', '=', 'sp.id')
            ->leftJoin('md_kelompok as mk', 'md_jamaah.md_kelompok_id', '=', 'mk.id')
            ->leftJoin('st_kategori_jamaah as skj', 'md_jamaah.st_kategori_jamaah_id', '=', 'skj.id')
            ->leftJoin('st_status_jamaah as ssj', 'md_jamaah.st_status_jamaah_id', '=', 'ssj.id')
            ->whereNull('md_jamaah.deleted_at')
            ->get();
    }

    public function checkIfUserExist($nik, $userID) {
        return $this->model->newQuery()
            ->where('nik', '!=', $nik)
            ->where('users_id', '=', $userID)
            ->exists();
    }
}
