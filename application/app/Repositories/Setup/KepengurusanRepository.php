<?php


namespace App\Repositories\Setup;

use App\Models\Setup\Kepengurusan;
use App\Repositories\BaseRepository;

class KepengurusanRepository extends BaseRepository
{
    public function __construct(Kepengurusan $model)
    {
        parent::__construct($model);
    }
}
