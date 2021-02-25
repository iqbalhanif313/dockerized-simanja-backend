<?php

namespace App\Repositories\Master;

use App\Models\Master\Kelompok;
use App\Repositories\BaseRepository;

class KelompokRepository extends BaseRepository
{
    public function __construct(Kelompok $model)
    {
        parent::__construct($model);
    }

    public function data($columns = '*')
    {
        return $this->model->newQuery()
            ->selectRaw("
                md_kelompok.id,
                md_kelompok.nama,
                md_kelompok.alamat,
                md_kelompok.st_desa_id,
                case when sd.nama is null then '-' else sd.nama end as desa
            ")
            ->leftJoin('st_desa as sd', 'md_kelompok.st_desa_id', '=', 'sd.id')
            ->whereNull('md_kelompok.deleted_at')
            ->get();
    }
}
