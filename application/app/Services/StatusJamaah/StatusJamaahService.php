<?php

namespace App\Services\StatusJamaah;

use App\Models\StatusJamaah;
use App\Repositories\StatusJamaahRepository;
use Illuminate\Support\Facades\DB;

class StatusJamaahService
{
    protected $statusJamaahRepository;

    public function __construct(StatusJamaahRepository $statusJamaahRepository)
    {
        $this->statusJamaahRepository = $statusJamaahRepository;
    }

    public function deleteById($id)
    {
        DB::transaction(function()use($id){
            $statusJamaah = StatusJamaah::find($id);
            $statusJamaah->delete();
        });
    }

    public function getAll()
    {
        return $this->statusJamaahRepository->getAll();
    }

    public function getById($id)
    {
        return StatusJamaah::find($id);
    }

    public function updateData($data, $id)
    {
        DB::transaction(function()use($data,$id){
            $statusJamaah = StatusJamaah::find($id);
            if(!$statusJamaah){
                return false;
            }
            $statusJamaah->nama = $data['nama'];
            $statusJamaah->save();
        });
        return true;

    }

    public function saveData($data)
    {
        DB::transaction(function()use($data){
            $statusJamaah = new StatusJamaah();
            $statusJamaah->id = $data['id'];
            $statusJamaah->nama = $data['nama'];
            $statusJamaah->save();
        });
    }

}
