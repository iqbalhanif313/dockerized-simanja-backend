<?php

namespace App\Services\Level;

use App\Models\Level;
use App\Repositories\LevelRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class LevelService
{
    protected $levelRepository;

    public function __construct(LevelRepository $levelRepository)
    {
        $this->levelRepository = $levelRepository;
    }

    public function deleteById($id)
    {
        DB::transaction(function()use($id){
            $level = Level::find($id);
            $level->delete();
        });
    }

    public function getAll()
    {
        return $this->levelRepository->getAll();
    }

    public function getRef()
    {
        return $this->levelRepository->getRef();
    }

    public function getById($id)
    {
        return Level::find($id);
    }

    public function updateData($data, $id)
    {
        DB::transaction(function()use($data,$id){
            $level = Level::find($id);
            if(!$level){
                return false;
            }
            $level->nama = $data['nama'];
            $level->save();
        });
        return true;

    }

    public function saveData($data)
    {
        DB::transaction(function()use($data){
            $level = new Level();
            $level->id = $data['id'];
            $level->nama = $data['nama'];
            $level->save();
        });
    }

}
