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

    public function flist($kab) {
        return $this->model->newQuery()
            ->selectRaw("id, concat(id, ' - ', nama) as text")
            ->where('st_kab_id', '=', $kab)
            ->whereNull('deleted_at')
            ->get();
    }
}
