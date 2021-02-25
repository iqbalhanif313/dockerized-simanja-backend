<?php

namespace App\Repositories\Setup;

use App\Models\Setup\Desa;
use App\Repositories\BaseRepository;

class DesaRepository extends BaseRepository
{
    public function __construct(Desa $model)
    {
        parent::__construct($model);
    }
}
