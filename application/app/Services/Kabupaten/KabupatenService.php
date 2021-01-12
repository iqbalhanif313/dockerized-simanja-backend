<?php


namespace App\Services\Kabupaten;


use App\Models\Kab;

class KabupatenService
{

    public function getAll(){
        $response = [];
        $kabupatens = Kab::all();
        foreach ($kabupatens as $kab){
            $response[] = [
                "id" => $kab->id,
                "nama" => $kab->nama,
                "provinsi"=>$kab->provinsi->nama,
            ];
        }
        return $response;
    }

}
