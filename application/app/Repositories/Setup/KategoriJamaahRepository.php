<?php

namespace App\Repositories\Setup;

use App\Models\Setup\KategoriJamaah;
use App\Repositories\BaseRepository;

class KategoriJamaahRepository extends BaseRepository
{
    public function __construct(KategoriJamaah $model)
    {
        parent::__construct($model);
    }
}
