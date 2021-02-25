<?php

namespace App\Repositories\Setup;

use App\Models\Setup\JenisKegiatan;
use App\Repositories\BaseRepository;

class JenisKegiatanRepository extends BaseRepository
{
    public function __construct(JenisKegiatan $model)
    {
        parent::__construct($model);
    }
}
