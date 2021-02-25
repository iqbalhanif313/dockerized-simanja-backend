<?php

namespace App\Repositories\Setup;

use App\Models\Setup\Kabupaten;
use App\Repositories\BaseRepository;

class KabupatenRepository extends BaseRepository
{
    public function __construct(Kabupaten $model)
    {
        parent::__construct($model);
    }

    public function data($columns = '*') {
        return $this->model->newQuery()
            ->selectRaw("
                st_kab.id,
                st_kab.nama,
                st_kab.st_provinsi_id,
                case when sp.nama is null then '-' else sp.nama end as provinsi
            ")
            ->leftJoin('st_provinsi as sp', 'st_kab.st_provinsi_id', '=', 'sp.id')
            ->whereNull('st_kab.deleted_at')
            ->get();
    }

    public function flist($prov) {
        return $this->model->newQuery()
            ->selectRaw("id, concat(id, ' - ', nama) as text")
            ->where('st_provinsi_id', '=', $prov)
            ->whereNull('deleted_at')
            ->get();
    }
}
