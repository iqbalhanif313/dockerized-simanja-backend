<?php

namespace App\Repositories\Setup;

use App\Models\Setup\Provinsi;
use App\Repositories\BaseRepository;

class ProvinsiRepository extends BaseRepository
{
    public function __construct(Provinsi $model)
    {
        parent::__construct($model);
    }
}
