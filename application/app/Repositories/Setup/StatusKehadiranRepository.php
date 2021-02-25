<?php

namespace App\Repositories\Setup;

use App\Models\Setup\StatusKehadiran;
use App\Repositories\BaseRepository;

class StatusKehadiranRepository extends BaseRepository
{
    public function __construct(StatusKehadiran $model)
    {
        parent::__construct($model);
    }
}
