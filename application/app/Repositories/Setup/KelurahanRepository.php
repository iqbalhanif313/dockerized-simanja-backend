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

    public function flist($kec) {
        return $this->model->newQuery()
            ->selectRaw("id, concat(id, ' - ', nama) as text")
            ->where('st_kec_id', '=', $kec)
            ->whereNull('deleted_at')
            ->get();
    }
}
