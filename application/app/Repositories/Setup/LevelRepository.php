<?php

namespace App\Repositories\Setup;

use App\Models\Setup\Level;
use App\Repositories\BaseRepository;

class LevelRepository extends BaseRepository
{
    public function __construct(Level $model)
    {
        parent::__construct($model);
    }
}
