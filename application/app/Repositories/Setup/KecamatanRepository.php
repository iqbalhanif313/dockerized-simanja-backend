<?php

namespace App\Repositories\Setup;

use App\Models\Setup\Kecamatan;
use App\Repositories\BaseRepository;

class KecamatanRepository extends BaseRepository
{
    public function __construct(Kecamatan $model)
    {
        parent::__construct($model);
    }

    public function data($columns = '*') {
        return $this->model->newQuery()
            ->selectRaw("
                st_kec.id,
                st_kec.nama,
                st_kec.st_kab_id,
                case when sk.nama is null then '-' else sk.nama end as kabupaten,
                sk.st_provinsi_id,
                case when sp.nama is null then '-' else sp.nama end as provinsi
            ")
            ->leftJoin('st_kab as sk', 'st_kec.st_kab_id', '=', 'sk.id')
            ->leftJoin('st_provinsi as sp', 'sk.st_provinsi_id', '=', 'sp.id')
            ->whereNull('st_kec.deleted_at')
            ->get();
    }

    public function flist($kab) {
        return $this->model->newQuery()
            ->selectRaw("id, concat(id, ' - ', nama) as text")
            ->where('st_kab_id', '=', $kab)
            ->whereNull('deleted_at')
            ->get();
    }
}
