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
                case when sk.nama is null then '-' else sk.nama end as kecamatan
            ")
            ->leftJoin('st_kec as sk', 'st_kel.st_kec_id', '=', 'sk.id')
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
