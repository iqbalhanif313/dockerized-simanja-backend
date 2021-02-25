<?php

namespace App\Repositories\Master;

use App\Models\Master\Kepengurusan;
use App\Repositories\BaseRepository;

class KepengurusanRepository extends BaseRepository
{
    public function __construct(Kepengurusan $model)
    {
        parent::__construct($model);
    }

    public function data($columns = '*')
    {
        return $this->model->newQuery()
            ->selectRaw("
                md_kepengurusan.id,
                md_kepengurusan.nama,
                md_kepengurusan.st_kepengurusan_id,
                case when sk.nama is null then '-' else sk.nama end as kepengurusan,
                md_kepengurusan.st_level_id,
                case when sl.nama is null then '-' else sl.nama end as level
            ")
            ->leftJoin('st_kepengurusan as sk', 'md_kepengurusan.st_kepengurusan_id', '=', 'sk.id')
            ->leftJoin('st_level as sl', 'md_kepengurusan.st_level_id', '=', 'sl.id')
            ->whereNull('md_kepengurusan.deleted_at')
            ->get();
    }
}
