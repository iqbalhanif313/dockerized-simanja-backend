<?php

namespace App\Repositories\Setup;

use App\Models\Setup\Kelurahan;
use App\Repositories\BaseRepository;

class KelurahanRepository extends BaseRepository
{
    public function __construct(Kelurahan $model)
    {
        parent::__construct($model);
    }

    public function data($columns = '*') {
        return $this->model->newQuery()
            ->selectRaw("
                st_kel.id,
                st_kel.nama,
                st_kel.st_kec_id,
                case when sc.nama is null then '-' else sc.nama end as kecamatan,
                sc.st_kab_id,
                case when sb.nama is null then '-' else sb.nama end as kabupaten,
                sb.st_provinsi_id,
                case when sp.nama is null then '-' else sp.nama end as provinsi
            ")
            ->leftJoin('st_kec as sc', 'st_kel.st_kec_id', '=', 'sc.id')
            ->leftJoin('st_kab as sb', 'sc.st_kab_id', '=', 'sb.id')
            ->leftJoin('st_provinsi as sp', 'sb.st_provinsi_id', '=', 'sp.id')
            ->whereNull('st_kel.deleted_at')
            ->get();
    }

    public function flist($kec) {
        return $this->model->newQuery()
            ->selectRaw("id, concat(id, ' - ', nama) as text")
            ->where('st_kec_id', '=', $kec)
            ->whereNull('deleted_at')
            ->get();
    }
}
