<?php

namespace App\Repositories\Setup;

use App\Models\Setup\TipeMutasi;
use App\Repositories\BaseRepository;

class TipeMutasiRepository extends BaseRepository
{
    public function __construct(TipeMutasi $model)
    {
        parent::__construct($model);
    }
}
