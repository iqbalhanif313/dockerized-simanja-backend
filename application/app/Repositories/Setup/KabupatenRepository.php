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

    public function flist($prov) {
        return $this->model->newQuery()
            ->selectRaw("id, concat(id, ' - ', nama) as text")
            ->where('st_provinsi_id', '=', $prov)
            ->whereNull('deleted_at')
            ->get();
    }
}
