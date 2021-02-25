<?php

namespace App\Repositories\Setup;

use App\Models\Setup\StatusJamaah;
use App\Repositories\BaseRepository;

class StatusJamaahRepository extends BaseRepository
{
    public function __construct(StatusJamaah $model)
    {
        parent::__construct($model);
    }
}
