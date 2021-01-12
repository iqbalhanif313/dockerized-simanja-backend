<?php

namespace App\Services\Desa;

use App\Models\Desa;
use App\Repositories\DesaRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class DesaService
{
    public function deleteById($id)
    {
        DB::transaction(function()use($id){
            $desa = Desa::find($id);
            $desa->delete();
        });
    }

    public function getAll()
    {
        return Desa::all();
    }

    public function getById($id)
    {
        return Desa::find($id);
    }

    public function updateData($data, $id)
    {
        DB::transaction(function()use($data,$id){
            $desa = Desa::find($id);
            if(!$desa){
                return false;
            }
            $desa->nama = $data['nama'];
            $desa->save();
        });
        return true;

    }

    public function saveData($data)
    {
        DB::transaction(function()use($data){
            $desa = new Desa();
            $desa->nama = $data['nama'];
            $desa->save();
        });
    }

}
