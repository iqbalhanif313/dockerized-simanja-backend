<?php

namespace App\Repositories;

use App\Models\Level;
use DB;

class LevelRepository
{
    /**
     * @var Level
     */
    protected $level;

    public function __construct(Level $level)
    {
        $this->level = $level;
    }

    public function getAll()
    {
        $data = Level::all();
        return $data;
    }

    public function getById($id)
    {
        return $this->level
            ->where('id', $id)
            ->get();
    }

}